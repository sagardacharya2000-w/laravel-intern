<x-student>

    <x-slot name="title">Student Dashboard — Online Siksha</x-slot>
    <x-slot name="pageTitle">Dashboard</x-slot>

    <div class="panel">
        <div style="padding: 24px;">
            <h3 style="margin:0 0 4px;font-size:18px;font-weight:700;color:#111827;">
                Welcome back, {{ auth()->user()->name }} 👋
            </h3>
            <p style="margin:0;font-size:14px;color:#6b7280;">
                {{ $enrolledClass->name ?? 'No class enrolled yet' }}
                @if($enrolledClass)
                    · Class Code: <strong style="color:#4338ca;">{{ $enrolledClass->class_code }}</strong>
                @endif
            </p>
        </div>
    </div>

    {{-- ─── Membership Banner ─────────────────────────────────────────── --}}
    @if($isPro)
        @php
            $daysLeft = now()->diffInDays($activeSubscription->expires_at, false);
        @endphp
        <div class="panel" style="background:linear-gradient(135deg,#4338ca,#6d28d9);border:none;">
            <div style="padding:20px 24px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                <div style="display:flex;align-items:center;gap:14px;">
                    <div style="background:rgba(255,255,255,0.15);width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-crown" style="font-size:22px;color:#fbbf24;"></i>
                    </div>
                    <div>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <span style="background:#fbbf24;color:#111827;font-size:11px;font-weight:800;padding:2px 8px;border-radius:999px;letter-spacing:.03em;">PRO MEMBER</span>
                            <span style="color:#fff;font-weight:700;font-size:14px;">{{ $activeSubscription->plan->name }}</span>
                        </div>
                        <p style="margin:4px 0 0;color:rgba(255,255,255,0.8);font-size:13px;">
                            Expires {{ $activeSubscription->expires_at->format('d M, Y') }}
                        </p>
                    </div>
                </div>
                <div style="text-align:right;">
                    <div style="color:#fff;font-size:24px;font-weight:800;">{{ max($daysLeft, 0) }}</div>
                    <div style="color:rgba(255,255,255,0.75);font-size:12px;">days remaining</div>
                </div>
            </div>
        </div>
    @else
        <div class="panel">
            <div style="padding:18px 24px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                <div style="display:flex;align-items:center;gap:12px;">
                    <i class="ti ti-lock" style="font-size:20px;color:#9ca3af;"></i>
                    <div>
                        <div style="font-weight:700;font-size:14px;color:#111827;">You're on the Free plan</div>
                        <p style="margin:2px 0 0;color:#6b7280;font-size:13px;">
                            Unlock premium exams and unlimited re-attempts with Pro.
                        </p>
                    </div>
                </div>
                <a href="{{ route('student.plans') }}" class="btn-primary">Upgrade to Pro</a>
            </div>
        </div>
    @endif

    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-file-text"></i> Upcoming Exams</div>
            <div class="stat-value">{{ $upcomingCount }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-circle-check"></i> Completed Exams</div>
            <div class="stat-value">{{ $completedCount }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-percentage"></i> Average Score</div>
            <div class="stat-value">{{ $averageScore }}%</div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Available Exams</h3>
        </div>

        @if($availableExams->isEmpty())
            <div class="empty-state">No exams available right now. Check back later.</div>
        @else
            <div class="exam-card-grid">
                @foreach($availableExams as $exam)
                <div class="exam-card" style="position:relative;">
                    @if($exam->is_premium)
                        <span style="position:absolute;top:14px;right:14px;background:#fbbf24;color:#111827;font-size:10px;font-weight:800;padding:2px 8px;border-radius:999px;">PRO</span>
                    @endif

                    <div class="exam-card-subject">{{ $exam->subject }}</div>
                    <div class="exam-card-title">{{ $exam->title }}</div>
                    <div class="exam-card-meta">
                        <span><i class="ti ti-clock"></i> {{ $exam->time_limit_minutes }} min</span>
                        <span><i class="ti ti-star"></i> {{ $exam->total_marks }} marks</span>
                    </div>

                    @if($exam->is_locked)
                        <a href="{{ route('student.plans') }}"
                            class="btn-secondary" style="width:100%;justify-content:center;">
                            <i class="ti ti-lock"></i> Unlock with Pro
                        </a>
                    @elseif($exam->is_active)
                        <a href="{{ route('student.exam-taking', $exam->exam_access_id) }}"
                            class="btn-primary" style="width:100%;justify-content:center;">
                            Start Exam
                        </a>
                    @else
                        <span class="badge badge-amber">Opens {{ $exam->scheduled_at->format('d M, h:i A') }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Attempt History</h3>
        </div>

        @if($attemptHistory->isEmpty())
            <div class="empty-state">No attempts yet. Once you take an exam, it'll show here.</div>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Exam Title</th>
                        <th>Date Attempted</th>
                        <th>Score</th>
                        <th>Total Marks</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attemptHistory as $attempt)
                    <tr>
                        <td>{{ $attempt->subject }}</td>
                        <td>{{ $attempt->title }}</td>
                        <td>{{ $attempt->date->format('d M Y') }}</td>
                        <td>{{ $attempt->score }}</td>
                        <td>{{ $attempt->total_marks }}</td>
                        <td>{{ $attempt->percentage }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-student>