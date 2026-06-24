<x-layouts.teacher>

    <x-slot:title>Teacher Dashboard — Online Siksha</x-slot:title>
    <x-slot:page_title>Dashboard</x-slot:page_title>

    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-users"></i> Total Students</div>
            <div class="stat-value">{{ $totalStudents }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-school"></i> Total Classes</div>
            <div class="stat-value">{{ $totalClasses }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-file-text"></i> Active Exams</div>
            <div class="stat-value">{{ $pendingExams }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="ti ti-clipboard-list"></i> Question Sets</div>
            <div class="stat-value">{{ $totalQuestionSets }}</div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header"><h3>My Classes</h3></div>
        @if($classes->isEmpty())
            <div class="empty-state">No classes assigned yet.</div>
        @else
            <table class="data-table">
                <thead><tr><th>Name</th><th>Grade</th><th>Academic Year</th><th>Students</th></tr></thead>
                <tbody>
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->grade_level }}</td>
                        <td>{{ $class->academic_year }}</td>
                        <td>{{ $class->students_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="panel">
        <div class="panel-header"><h3>My Question Sets</h3></div>
        @if($questionSets->isEmpty())
            <div class="empty-state">No question sets created yet.</div>
        @else
            <table class="data-table">
                <thead><tr><th>Title</th><th>Subject</th><th>Questions</th><th>Time Limit</th><th>Attempts</th></tr></thead>
                <tbody>
                    @foreach($questionSets as $qs)
                    <tr>
                        <td>{{ $qs->title }}</td>
                        <td>{{ $qs->subject->name ?? '—' }}</td>
                        <td>{{ $qs->questions_count }}</td>
                        <td>{{ $qs->time_limit_minutes }} min</td>
                        <td>{{ $qs->attempts_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="panel">
        <div class="panel-header"><h3>Exam Schedule</h3></div>
        @if($examSchedule->isEmpty())
            <div class="empty-state">No exams scheduled yet.</div>
        @else
            <table class="data-table">
                <thead><tr><th>Question Set</th><th>Class</th><th>Scheduled</th><th>Expires</th><th>Status</th></tr></thead>
                <tbody>
                    @foreach($examSchedule as $ea)
                    <tr>
                        <td>{{ $ea->questionSet->title ?? '—' }}</td>
                        <td>{{ $ea->schoolClass->name ?? '—' }}</td>
                        <td>{{ $ea->scheduled_at->format('d M Y, h:i A') }}</td>
                        <td>{{ $ea->expires_at->format('d M Y, h:i A') }}</td>
                        <td>
                            @if($ea->isActive())<span class="badge badge-green">Active</span>
                            @elseif($ea->isUpcoming())<span class="badge badge-amber">Upcoming</span>
                            @else<span class="badge badge-gray">Expired</span>@endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="panel">
        <div class="panel-header"><h3>Class Results</h3></div>
        @if($classResults->isEmpty())
            <div class="empty-state">No classes to show results for.</div>
        @else
            <table class="data-table">
                <thead><tr><th>Class</th><th>Attempts</th><th>Average Score</th></tr></thead>
                <tbody>
                    @foreach($classResults as $row)
                    <tr>
                        <td>{{ $row['class']->name }}</td>
                        <td>{{ $row['attempts_count'] }}</td>
                        <td>{{ $row['average_percentage'] }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="panel">
        <div class="panel-header"><h3>Recent Attempts</h3></div>
        @if($recentAttempts->isEmpty())
            <div class="empty-state">No attempts submitted yet.</div>
        @else
            <table class="data-table">
                <thead><tr><th>Student</th><th>Question Set</th><th>Score</th><th>Submitted</th></tr></thead>
                <tbody>
                    @foreach($recentAttempts as $attempt)
                    <tr>
                        <td>{{ $attempt->student->name ?? '—' }}</td>
                        <td>{{ $attempt->questionSet->title ?? '—' }}</td>
                        <td>{{ $attempt->score }}/{{ $attempt->total_marks }}</td>
                        <td>{{ $attempt->submitted_at->format('d M Y, h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-layouts.teacher>
