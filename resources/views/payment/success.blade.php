<x-student :page-title="'Payment Successful'">

<div class="panel" style="max-width:480px;margin:0 auto;text-align:center;padding:40px 24px;">

    <div style="font-size:48px;color:#047857;margin-bottom:12px;">
        <i class="ti ti-circle-check"></i>
    </div>

    <h2 style="font-size:20px;font-weight:800;color:#111827;margin:0 0 8px;">Payment Successful</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">
        Your subscription to <strong>{{ $payment->plan->name }}</strong> is now active.
    </p>

    <div style="text-align:left;background:#f9fafb;border:1px solid #eef0f3;border-radius:8px;padding:16px;font-size:14px;margin-bottom:24px;">
        <p style="margin:4px 0;"><span style="color:#6b7280;">Amount paid:</span> Rs. {{ number_format($payment->amountInRupees()) }}</p>
        <p style="margin:4px 0;"><span style="color:#6b7280;">Transaction ID:</span> {{ $payment->khalti_txn_id }}</p>
        <p style="margin:4px 0;"><span style="color:#6b7280;">Valid until:</span> {{ $payment->subscription->expires_at->format('d M, Y') }}</p>
    </div>

    <a href="{{ route('student.dashboard') }}" class="btn-primary" style="width:100%;justify-content:center;">
        Go to Dashboard
    </a>

</div>

</x-student>
