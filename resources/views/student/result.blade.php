<x-student>
    <x-slot name="title">Attempt History — Online Siksha</x-slot>
    <x-slot name="pageTitle">Attempt History</x-slot>

    {{-- Summary Stat Cards --}}
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-clipboard-list"></i> Total Attempts
            </div>
            <div class="stat-value">{{ $attempts->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-percentage"></i> Average Score
            </div>
            <div class="stat-value">
                {{ $attempts->count() ? round($attempts->avg('percentage')) : 0 }}%
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-trophy"></i> Best Score
            </div>
            <div class="stat-value">
                {{ $attempts->count() ? $attempts->max('percentage') : 0 }}%
            </div>
        </div>
    </div>

    {{-- Attempts Table --}}
    <div class="panel">
        <div class="panel-header">
            <h3>All Attempts</h3>
        </div>

        @if($attempts->isEmpty())
            <div class="empty-state">
                No attempts yet. Once you take an exam, it will show here.
            </div>
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
                        <th>Result</th>
                        <th>Analysis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attempts as $attempt)
                    <tr>
                        <td>{{ $attempt->subject }}</td>
                        <td style="font-weight:600;">{{ $attempt->title }}</td>
                        <td>{{ $attempt->submitted_at->format('d M Y, h:i A') }}</td>
                        <td>{{ $attempt->score }}</td>
                        <td>{{ $attempt->total_marks }}</td>
                        <td>{{ $attempt->percentage }}%</td>
                        <td>
                            @if($attempt->percentage >= 40)
                                <span class="badge badge-green">Pass</span>
                            @else
                                <span class="badge badge-gray">Fail</span>
                            @endif
                        </td>
                        <td>
                      <a href="{{ route('student.result.analysis', $attempt->id) }}"
                   class="btn-secondary"
                    style="padding:6px 12px;font-size:12px;">
                         <i class="ti ti-chart-bar"></i>
                            View Analysis
                               </a>
                           </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-student>
