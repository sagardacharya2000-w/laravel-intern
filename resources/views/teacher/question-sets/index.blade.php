<x-layouts.teacher>

    <x-slot:title>Question Sets — Online Siksha</x-slot:title>
    <x-slot:page_title>Question Sets</x-slot:page_title>

    <div class="panel">
        <div class="panel-header">
            <h3>My Question Sets</h3>
            {{-- Button to go to the create form --}}
            <a href="{{ route('teacher.question-sets.create') }}" class="btn-primary">
                <i class="ti ti-plus"></i> New Question Set
            </a>
        </div>

        {{-- If no question sets exist yet, show a friendly message --}}
        @if ($questionSets->isEmpty())
            <div class="empty-state">
                No question sets yet. Click "New Question Set" to create one.
            </div>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Questions</th>
                        <th>Time Limit</th>
                        <th>Randomized</th>
                        <th>Attempts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questionSets as $qs)
                        <tr>
                            <td>{{ $qs->title }}</td>

                            <td>{{ $qs->subject->name ?? '—' }}</td>

                            <td>{{ $qs->questions_count }}</td>

                            <td>{{ $qs->time_limit_minutes }} min</td>

                            <td>
                                @if ($qs->is_randomized)
                                    <span class="badge badge-green">Yes</span>
                                @else
                                    <span class="badge badge-gray">No</span>
                                @endif
                            </td>

                            <td>{{ $qs->attempts_count }}</td>

                            <td>
                                <a href="{{ route('teacher.question-sets.edit', $qs->id) }}" class="action-link">Edit</a>

                                <form action="{{ route('teacher.question-sets.destroy', $qs->id) }}" method="POST"
                                    style="display:inline"
                                    onsubmit="return confirm('Delete this question set and all its questions?')">
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
