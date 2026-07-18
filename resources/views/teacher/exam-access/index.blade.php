<x-layouts.teacher>

    <x-slot:title>Exam Access — Online Siksha</x-slot:title>
    <x-slot:page_title>Exam Access</x-slot:page_title>

    <div class="panel">
        <div class="panel-header">
            <h3>Exam Schedule</h3>
            {{-- button to go to create form --}}
            <a href="{{ route('teacher.exam-access.create') }}" class="btn-primary">
                <i class="ti ti-plus"></i> Schedule Exam
            </a>
        </div>

        @if($examAccesses->isEmpty())
            <div class="empty-state">No exams scheduled yet. Click "Schedule Exam" to add one.</div>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Question Set</th>
                        <th>Class</th>
                        <th>Scheduled At</th>
                        <th>Expires At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($examAccesses as $ea)
                    <tr>
                        <td>{{ $ea->questionSet->title ?? '—' }}</td>
                        {{-- ?? '—' shows dash if question set was deleted --}}

                        <td>{{ $ea->schoolClass->name ?? '—' }}</td>

                        <td>{{ $ea->scheduled_at->format('d M Y, h:i A') }}</td>
                        {{-- Carbon format — scheduled_at is Carbon object in dummy data --}}

                        <td>{{ $ea->expires_at->format('d M Y, h:i A') }}</td>

                        <td>
                            @php
                                $now      = now();
                                $active   = $now->gte($ea->scheduled_at) && $now->lte($ea->expires_at);
                                $upcoming = $now->lt($ea->scheduled_at);
                                // calculate status manually — dummy stdClass doesn't have
                                // isActive()/isUpcoming() methods like real ExamAccess model
                                // backend's real model has these methods already
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
                            <a href="{{ route('teacher.exam-access.edit', $ea->id) }}"
                                class="action-link">Edit</a>
                            {{-- pass $ea->id not $ea — same fix as question sets --}}

                            <form action="{{ route('teacher.exam-access.destroy', $ea->id) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Delete this exam access?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link action-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-layouts.teacher>
