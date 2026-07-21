<x-student :page-title="'Subscription Plans'">

<p style="color:#6b7280;font-size:14px;margin:-12px 0 24px;">
    Subscribe to unlock full access to exams and results
</p>

@if (session('error'))
    <div class="alert-success" style="background:#fef2f2;color:#dc2626;border-color:#fecaca;">
        {{ session('error') }}
    </div>
@endif

<div class="exam-card-grid">

    @php $bestPlan = $plans->sortByDesc('duration_days')->first(); @endphp

    @forelse ($plans as $plan)
        <div class="exam-card">

            @if ($plan->id === $bestPlan?->id)
                <span class="badge badge-green" style="margin-bottom:10px;">BEST VALUE</span>
            @endif

            <div class="exam-card-subject">{{ $plan->name }} PLAN</div>

            <div class="exam-card-title" style="font-size:24px;">
                रू {{ number_format($plan->priceInRupees()) }}
                <span style="font-size:13px;font-weight:500;color:#6b7280;">/ {{ $plan->duration_days }} days</span>
            </div>

            @if ($plan->description)
                <p style="font-size:13px;color:#6b7280;margin-bottom:12px;">{{ $plan->description }}</p>
            @endif

            <div style="display:flex;flex-direction:column;gap:6px;font-size:13px;color:#4b5563;margin-bottom:16px;">
                <span><i class="ti ti-check" style="color:#047857;"></i> Unlimited exam attempts</span>
                <span><i class="ti ti-check" style="color:#047857;"></i> All exam features included</span>
                <span><i class="ti ti-check" style="color:#047857;"></i> In-app notifications</span>
                <span><i class="ti ti-check" style="color:#047857;"></i> Result history</span>
            </div>

            <form method="POST" action="{{ route('student.subscribe', $plan) }}">
                @csrf
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                    <i class="ti ti-wallet"></i> Pay with Khalti
                </button>
            </form>
        </div>
    @empty
        <div class="empty-state">No subscription plans are available right now.</div>
    @endforelse

</div>

</x-student>
