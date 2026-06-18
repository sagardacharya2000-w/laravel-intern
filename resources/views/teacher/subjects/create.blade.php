@extends('layouts.teacher')

@section('title', 'New Subject — Online Siksha')
@section('page_title', 'New Subject')

@section('content')

<div class="panel">
    <div class="panel-header">
        <h3>Create Subject</h3>
    </div>
    <div style="padding: 24px;">
        <form action="{{ route('teacher.subjects.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
                @error('name')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="description">Description (optional)</label>
                <textarea name="description" id="description" class="form-input" rows="4">{{ old('description') }}</textarea>
                @error('description')<div class="form-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('teacher.subjects.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Create Subject</button>
            </div>
        </form>
    </div>
</div>

@endsection
