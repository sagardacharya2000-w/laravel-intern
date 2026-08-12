<x-student>
    <x-slot name="title">My Exams — Online Siksha</x-slot>
    <x-slot name="pageTitle">My Exams</x-slot>

    @if(!$isPro)
        <div class="panel" style="border-color:#fde68a;background:#fffbeb;">
            <div style="padding:14px 24px;display:flex;align-items:center;gap:10px;">
                <i class="ti ti-lock" style="color:#b45309;"></i>
                <p style="margin:0;font-size:13px;color:#92400e;">
                    You're on the Free plan — premium exams are locked and each free exam allows only 1 attempt.
                    <a href="{{ route('student.plans') }}" style="color:#4338ca;font-weight:700;">Upgrade to Pro</a>
                    for unlimited access.
                </p>
            </div>
        </div>
    @endif

    <div class="panel">
        <div class="panel-header">
            <h3>All Exams</h3>
        </div>

        @if($exams->isEmpty())
            <div class="empty-state">
                No exams assigned to your class yet.
            </div>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Exam Title</th>
                        <th>Time Limit</th>
                        <th>Marks</th>
                        <th>Starts</th>
                        <th>Expires</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{ $exam->subject }}</td>
                        <td style="font-weight:600;">
                            {{ $exam->title }}
                            @if($exam->is_premium)
                                <span style="background:#fbbf24;color:#111827;font-size:10px;font-weight:800;padding:2px 6px;border-radius:999px;margin-left:6px;">PRO</span>
                            @endif
                        </td>
                        <td>{{ $exam->time_limit_minutes }} min</td>
                        <td>{{ $exam->total_marks }}</td>
                        <td>{{ $exam->scheduled_at->format('d M, h:i A') }}</td>
                        <td>{{ $exam->expires_at->format('d M, h:i A') }}</td>
                        <td>
                            @php
                                $now      = now();
                                $active   = $now->gte($exam->scheduled_at) && $now->lte($exam->expires_at);
                                $upcoming = $now->lt($exam->scheduled_at);
                            @endphp
                            @if($active)
                                <span class="badge badge-green">Active</span>
                            @elseif($upcoming)
                                <span class="badge badge-amber">Upcoming</span>
                            @else
                                <span class="badge badge-gray">Expired</span>
                            @endif
                        </td>
                        <td>
                            @if($exam->is_locked)
                                <a href="{{ route('student.plans') }}"
                                    class="btn-secondary" style="padding:6px 12px;font-size:13px;">
                                    <i class="ti ti-lock"></i> Unlock
                                </a>
                            @elseif($active)
                                <a href="{{ route('student.exam-taking', $exam->id) }}"
                                    class="btn-primary" style="padding:6px 12px;font-size:13px;">
                                    Start Exam
                                </a>
                            @else
                                <span style="font-size:13px;color:#9ca3af;">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-student>
