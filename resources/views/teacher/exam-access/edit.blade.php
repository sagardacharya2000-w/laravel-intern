<x-layouts.teacher>

    <x-slot:title>Edit Exam Access — Online Siksha</x-slot:title>
    <x-slot:page_title>Edit Exam Access</x-slot:page_title>

    <div class="panel">
        <div class="panel-header">
            <h3>Edit Exam Schedule</h3>
        </div>

        <div style="padding: 24px;">
            <form action="{{ route('teacher.exam-access.update', $examAccess->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                {{-- PUT tells Laravel this is an update not a create --}}

                <div class="form-group">
                    <label for="question_set_id">Question Set</label>
                    <select name="question_set_id" id="question_set_id" class="form-input" required>
                        <option value="">-- Select Question Set --</option>
                        @foreach($questionSets as $qs)
                            <option value="{{ $qs->id }}"
                                {{ old('question_set_id', $examAccess->question_set_id) == $qs->id ? 'selected' : '' }}>
                                {{-- pre-selects the currently saved question set --}}
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
                                {{ old('class_id', $examAccess->class_id) == $class->id ? 'selected' : '' }}>
                                {{-- pre-selects the currently saved class --}}
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
                        value="{{ old('scheduled_at', $examAccess->scheduled_at->format('Y-m-d\TH:i')) }}"
                        {{-- format('Y-m-d\TH:i') converts Carbon to datetime-local format
                             e.g. "2026-06-18T10:30" — what datetime-local input expects --}}
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
                        value="{{ old('expires_at', $examAccess->expires_at->format('Y-m-d\TH:i')) }}"
                        class="form-input"
                        required
                    >
                    @error('expires_at')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('teacher.exam-access.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Update Exam Schedule</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
