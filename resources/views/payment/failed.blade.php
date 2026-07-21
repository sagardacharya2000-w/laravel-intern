<x-student :page-title="'Payment Not Completed'">

<div class="panel" style="max-width:480px;margin:0 auto;text-align:center;padding:40px 24px;">

    <div style="font-size:48px;color:#dc2626;margin-bottom:12px;">
        <i class="ti ti-circle-x"></i>
    </div>

    <h2 style="font-size:20px;font-weight:800;color:#111827;margin:0 0 8px;">Payment Not Completed</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">
        Your payment could not be confirmed
        @if ($payment->failure_reason)
            (status: {{ $payment->failure_reason }})
        @endif.
        No subscription has been activated and nothing was charged.
    </p>

    <a href="{{ route('student.plans') }}" class="btn-primary" style="width:100%;justify-content:center;">
        Try Again
    </a>

</div>

</x-student>
