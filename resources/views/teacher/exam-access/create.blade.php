<x-layouts.teacher>

    <x-slot:title>Schedule Exam — Online Siksha</x-slot:title>
    <x-slot:page_title>Schedule Exam</x-slot:page_title>

    <div class="panel">
        <div class="panel-header">
            <h3>Schedule New Exam</h3>
        </div>

        <div style="padding: 24px;">
            <form action="{{ route('teacher.exam-access.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="question_set_id">Question Set</label>
                    <select name="question_set_id" id="question_set_id" class="form-input" required>
                        <option value="">-- Select Question Set --</option>
                        @foreach($questionSets as $qs)
                            <option value="{{ $qs->id }}"
                                {{ old('question_set_id') == $qs->id ? 'selected' : '' }}>
                                {{-- old() keeps selection if validation fails --}}
                                {{ $qs->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('question_set_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="class_id">Assign To Class</label>
                    <select name="class_id" id="class_id" class="form-input" required>
                        <option value="">-- Select Class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}"
                                {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="scheduled_at">Start Date & Time</label>
                    <input
                        type="datetime-local"
                        name="scheduled_at"
                        id="scheduled_at"
                        value="{{ old('scheduled_at') }}"
                        {{-- datetime-local gives a date+time picker in browser --}}
                        class="form-input"
                        required
                    >
                    @error('scheduled_at')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="expires_at">End Date & Time</label>
                    <input
                        type="datetime-local"
                        name="expires_at"
                        id="expires_at"
                        value="{{ old('expires_at') }}"
                        class="form-input"
                        required
                    >
                    @error('expires_at')
                        {{-- shows if expires_at is before scheduled_at --}}
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('teacher.exam-access.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Schedule Exam</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
