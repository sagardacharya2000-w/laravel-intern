@extends('layouts.teacher')

@section('title', 'Edit Subject — Online Siksha')
@section('page_title', 'Edit Subject')

@section('content')

<div class="panel">
    <div class="panel-header">
        <h3>Edit Subject</h3>
    </div>
    <div style="padding: 24px;">
        <form action="{{ route('teacher.subjects.update', $subject) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $subject->name) }}" class="form-input" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="description">Description (optional)</label>
                <textarea name="description" id="description" class="form-input" rows="4">{{ old('description', $subject->description) }}</textarea>
                @error('description')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('teacher.subjects.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Update Subject</button>
            </div>
        </form>
    </div>
</div>

@endsection
