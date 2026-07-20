<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Services\KhaltiService;
use Illuminate\Http\Request;
use RuntimeException;

class PaymentController extends Controller
{
    public function plans()
    {
        $plans = SubscriptionPlan::where('is_active', true)->get();

        return view('student.plans', compact('plans'));
    }

    public function subscribe(SubscriptionPlan $plan, KhaltiService $khalti)
    {
        $user = auth()->user();

        $payment = Payment::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'amount' => $plan->price,
            'status' => 'pending',
        ]);

        try {
            $result = $khalti->initiate(
                amountInPaisa: $plan->price,
                purchaseOrderId: 'PAYMENT-' . $payment->id,
                purchaseOrderName: $plan->name . ' Subscription',
                customerInfo: [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone ?: '9800000000',
                ],
            );
        } catch (RuntimeException $e) {
            $payment->update([
                'status' => 'failed',
                'failure_reason' => $e->getMessage(),
            ]);

            return redirect()
                ->route('student.plans')
                ->with('error', 'Could not start the payment. Please try again.');
        }

        $payment->update(['khalti_pidx' => $result['pidx']]);

        return redirect($result['payment_url']);
    }

    public function callback(Request $request, KhaltiService $khalti)
    {
        $pidx = $request->query('pidx');

        $payment = Payment::where('khalti_pidx', $pidx)->firstOrFail();

        if ($payment->status !== 'pending') {
            $view = $payment->isSuccessful() ? 'payment.success' : 'payment.failed';

            return response()
                ->view($view, compact('payment'))
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        }

        $result = $khalti->lookup($pidx);

        $attempts = 0;
        while (($result['status'] ?? null) === 'Pending' && $attempts < 3) {
            sleep(1);
            $result = $khalti->lookup($pidx);
            $attempts++;
        }

        if (($result['status'] ?? null) !== 'Completed') {
            $payment->update([
                'status' => 'failed',
                'failure_reason' => $result['status'] ?? 'unknown',
            ]);

            return response()
                ->view('payment.failed', compact('payment'))
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        }

        $subscription = Subscription::create([
            'user_id' => $payment->user_id,
            'plan_id' => $payment->plan_id,
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => $payment->plan->expiryFromNow(),
        ]);

        $payment->update([
            'status' => 'success',
            'subscription_id' => $subscription->id,
            'khalti_txn_id' => $result['transaction_id'] ?? null,
            'paid_at' => now(),
        ]);

        return response()
            ->view('payment.success', compact('payment'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }
}
