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
                <div class="exam-card">
                    <div class="exam-card-subject">{{ $exam->subject }}</div>
                    <div class="exam-card-title">{{ $exam->title }}</div>
                    <div class="exam-card-meta">
                        <span><i class="ti ti-clock"></i> {{ $exam->time_limit_minutes }} min</span>
                        <span><i class="ti ti-star"></i> {{ $exam->total_marks }} marks</span>
                    </div>
                    @if($exam->is_active)
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
