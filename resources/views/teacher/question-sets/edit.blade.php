<x-layouts.teacher>

    <x-slot:title>Edit Question Set — Online Siksha</x-slot:title>
    <x-slot:page_title>Edit Question Set</x-slot:page_title>

    <x-slot:styles>
    <style>
        .question-card {
            background: #f9fafb;
            border: 1px solid #eef0f3;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            position: relative;
        }
        .question-number {
            font-size: 13px;
            font-weight: 700;
            color: #4338ca;
            margin-bottom: 14px;
        }
        .options-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .remove-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            background: #fee2e2;
            color: #dc2626;
            border: none;
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }
        .remove-btn:hover { background: #fecaca; }
    </style>
    </x-slot:styles>

    <div class="panel">
        <div class="panel-header">
            <h3>Edit Question Set</h3>
        </div>

        <div style="padding: 24px;">
            <form action="{{ route('teacher.question-sets.update', $questionSet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $questionSet->title) }}"
                        class="form-input"
                        required
                    >
                    @error('title')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="subject_id">Subject</label>
                    <select name="subject_id" id="subject_id" class="form-input" required>
                        <option value="">-- Select Subject --</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}"
                                {{ old('subject_id', $questionSet->subject_id) == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="time_limit_minutes">Time Limit (minutes)</label>
                    <input
                        type="number"
                        name="time_limit_minutes"
                        id="time_limit_minutes"
                        value="{{ old('time_limit_minutes', $questionSet->time_limit_minutes) }}"
                        class="form-input"
                        min="1"
                        required
                    >
                    @error('time_limit_minutes')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;">
                        <input
                            type="checkbox"
                            name="is_randomized"
                            value="1"
                            {{ old('is_randomized', $questionSet->is_randomized) ? 'checked' : '' }}
                            style="width:18px;height:18px;"
                        >
                        Randomize question order for each student
                    </label>
                </div>

                <div style="margin-top:32px;margin-bottom:16px;display:flex;align-items:center;justify-content:space-between;">
                    <h4 style="margin:0;font-size:16px;font-weight:700;color:#111827;">Questions</h4>
                    <button type="button" onclick="addQuestion()" class="btn-primary">
                        <i class="ti ti-plus"></i> Add Question
                    </button>
                </div>

                <div id="questionsContainer">
                    {{-- Loop through existing questions and pre-fill each row --}}
                    @foreach($questions as $index => $question)
                    <div class="question-card" id="question-existing-{{ $index }}">
                        <div class="question-number">Question {{ $index + 1 }}</div>

                        <button type="button" class="remove-btn"
                            onclick="document.getElementById('question-existing-{{ $index }}').remove()">
                            Remove
                        </button>

                        <div class="form-group">
                            <label>Question Prompt</label>
                            <textarea
                                name="questions[existing-{{ $index }}][prompt]"
                                class="form-input"
                                rows="2"
                                required
                            >{{ $question->prompt }}</textarea>
                            {{-- pre-filled with existing question text --}}
                        </div>

                        <div class="options-grid">
                            <div class="form-group">
                                <label>Option A</label>
                                <input type="text" name="questions[existing-{{ $index }}][option_a]"
                                    class="form-input" value="{{ $question->option_a }}" required>
                            </div>
                            <div class="form-group">
                                <label>Option B</label>
                                <input type="text" name="questions[existing-{{ $index }}][option_b]"
                                    class="form-input" value="{{ $question->option_b }}" required>
                            </div>
                            <div class="form-group">
                                <label>Option C</label>
                                <input type="text" name="questions[existing-{{ $index }}][option_c]"
                                    class="form-input" value="{{ $question->option_c }}" required>
                            </div>
                            <div class="form-group">
                                <label>Option D</label>
                                <input type="text" name="questions[existing-{{ $index }}][option_d]"
                                    class="form-input" value="{{ $question->option_d }}" required>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            <div class="form-group">
                                <label>Correct Answer</label>
                                <select name="questions[existing-{{ $index }}][correct_answer]"
                                    class="form-input" required>
                                    <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>D</option>
                                    {{-- pre-selects whichever answer was saved --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Marks</label>
                                <input type="number" name="questions[existing-{{ $index }}][marks]"
                                    class="form-input" value="{{ $question->marks }}" min="1" required>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @error('questions')
                    <div class="form-error" style="margin-bottom:16px;">{{ $message }}</div>
                @enderror

                <div class="form-actions">
                    <a href="{{ route('teacher.question-sets.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Update Question Set</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot:scripts>
    <script>
        // Counter starts after existing questions
        // so new questions don't have conflicting array keys with existing ones
        let questionCount = {{ $questions->count() }};
        // e.g. if 3 questions exist, new ones start from index 3+

        function addQuestion() {
            questionCount++;
            const container = document.getElementById('questionsContainer');
            const div = document.createElement('div');
            div.className = 'question-card';
            div.id = `question-new-${questionCount}`;
            // prefix 'new-' to distinguish from 'existing-' rows above

            div.innerHTML = `
                <div class="question-number">New Question</div>
                <button type="button" class="remove-btn"
                    onclick="document.getElementById('question-new-${questionCount}').remove()">
                    Remove
                </button>
                <div class="form-group">
                    <label>Question Prompt</label>
                    <textarea name="questions[new-${questionCount}][prompt]"
                        class="form-input" rows="2" required></textarea>
                </div>
                <div class="options-grid">
                    <div class="form-group">
                        <label>Option A</label>
                        <input type="text" name="questions[new-${questionCount}][option_a]"
                            class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>Option B</label>
                        <input type="text" name="questions[new-${questionCount}][option_b]"
                            class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>Option C</label>
                        <input type="text" name="questions[new-${questionCount}][option_c]"
                            class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>Option D</label>
                        <input type="text" name="questions[new-${questionCount}][option_d]"
                            class="form-input" required>
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <select name="questions[new-${questionCount}][correct_answer]"
                            class="form-input" required>
                            <option value="">-- Select --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Marks</label>
                        <input type="number" name="questions[new-${questionCount}][marks]"
                            class="form-input" value="1" min="1" required>
                    </div>
                </div>
            `;
            container.appendChild(div);
        }
    </script>
    </x-slot:scripts>

</x-layout>
