@extends('layouts.teacher')

@section('title', 'Subjects — Online Siksha')
@section('page_title', 'Subjects')

@section('content')

<div class="panel">
    <div class="panel-header">
        <h3>My Subjects</h3>
        <a href="{{ route('teacher.subjects.create') }}" class="btn-primary">
            <i class="ti ti-plus"></i> New Subject
        </a>
    </div>

    @if($subjects->isEmpty())
        <div class="empty-state">No subjects created yet. Click "New Subject" to add one.</div>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Question Sets</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->description ?? '—' }}</td>
                    <td>{{ $subject->question_sets_count }}</td>
                    <td>{{ $subject->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('teacher.subjects.edit', $subject) }}" class="action-link">Edit</a>
                        <form action="{{ route('teacher.subjects.destroy', $subject) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this subject?')">
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

@endsection
