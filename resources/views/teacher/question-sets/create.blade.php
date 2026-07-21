<x-layouts.teacher>

    <x-slot:title>New Question Set — Online Siksha</x-slot:title>
    <x-slot:page_title>New Question Set</x-slot:page_title>

    <x-slot:styles>
    <style>
        /* Style for each question card/row */
        .question-card {
            background: #f9fafb;
            border: 1px solid #eef0f3;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            position: relative;
            /* position:relative so the remove button can be positioned absolutely inside */
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
            /* 2-column grid for options A/B/C/D */
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

        .remove-btn:hover {
            background: #fecaca;
        }
    </style>
    </x-slot:styles>

    <div class="panel">
        <div class="panel-header">
            <h3>Create Question Set</h3>
        </div>

        <div style="padding: 24px;">
            {{-- Form posts to teacher.question-sets.store route --}}
            <form action="{{ route('teacher.question-sets.store') }}" method="POST" id="questionSetForm">
                @csrf

                {{-- ── BASIC INFO SECTION ─────────────────────────────────────── --}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        {{-- old('title') refills the field if validation fails --}}
                        class="form-input"
                        placeholder="e.g. Mid-term Algebra Test"
                        required
                    >
                    @error('title')
                        {{-- shows validation error message if title fails --}}
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject_id">Subject</label>
                    <select name="subject_id" id="subject_id" class="form-input" required>
                        <option value="">-- Select Subject --</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}"
                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{-- 'selected' keeps the chosen option after validation fails --}}
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="time_limit_minutes">Time Limit (minutes)</label>
                    <input
                        type="number"
                        name="time_limit_minutes"
                        id="time_limit_minutes"
                        value="{{ old('time_limit_minutes', 30) }}"
                        {{-- defaults to 30 minutes if nothing typed yet --}}
                        class="form-input"
                        min="1"
                        required
                    >
                    @error('time_limit_minutes')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;">
                        <input
                            type="checkbox"
                            name="is_randomized"
                            value="1"
                            {{ old('is_randomized') ? 'checked' : '' }}
                            style="width:18px;height:18px;"
                        >
                        {{-- value="1" so PHP receives '1' when checked, nothing when unchecked
                             $request->boolean('is_randomized') in controller handles both cases --}}
                        Randomize question order for each student
                    </label>
                </div>

                {{-- ── QUESTIONS SECTION ──────────────────────────────────────── --}}

                <div style="margin-top:32px;margin-bottom:16px;display:flex;align-items:center;justify-content:space-between;">
                    <h4 style="margin:0;font-size:16px;font-weight:700;color:#111827;">Questions</h4>
                    <button type="button" onclick="addQuestion()" class="btn-primary">
                        <i class="ti ti-plus"></i> Add Question
                        {{-- onclick calls the JS function below to add a new question row --}}
                    </button>
                </div>

                {{-- Container where question rows get added dynamically by JS --}}
                <div id="questionsContainer"></div>

                @error('questions')
                    {{-- shows error if no questions were added at all --}}
                    <div class="form-error" style="margin-bottom:16px;">{{ $message }}</div>
                @enderror

                <div class="form-actions">
                    <a href="{{ route('teacher.question-sets.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Create Question Set</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot:scripts>
    <script>
        let questionCount = 0;

        function addQuestion() {
            questionCount++;

            const container = document.getElementById('questionsContainer');

            const div = document.createElement('div');
            div.className = 'question-card';
            div.id = `question-${questionCount}`;

            div.innerHTML = `
                <div class="question-number">Question ${questionCount}</div>

                <button type="button" class="remove-btn" onclick="removeQuestion(${questionCount})">
                    Remove
                </button>

                <div class="form-group">
                    <label>Question Prompt</label>
                    <textarea
                        name="questions[${questionCount}][prompt]"
                        class="form-input"
                        rows="2"
                        placeholder="Type your question here..."
                        required
                    ></textarea>
                </div>

                <div class="options-grid">
                    <div class="form-group">
                        <label>Option A</label>
                        <input type="text" name="questions[${questionCount}][option_a]"
                            class="form-input" placeholder="Option A" required>
                    </div>
                    <div class="form-group">
                        <label>Option B</label>
                        <input type="text" name="questions[${questionCount}][option_b]"
                            class="form-input" placeholder="Option B" required>
                    </div>
                    <div class="form-group">
                        <label>Option C</label>
                        <input type="text" name="questions[${questionCount}][option_c]"
                            class="form-input" placeholder="Option C" required>
                    </div>
                    <div class="form-group">
                        <label>Option D</label>
                        <input type="text" name="questions[${questionCount}][option_d]"
                            class="form-input" placeholder="Option D" required>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <select name="questions[${questionCount}][correct_answer]"
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
                        <input type="number" name="questions[${questionCount}][marks]"
                            class="form-input" value="1" min="1" required>
                    </div>
                </div>
            `;

            container.appendChild(div);
        }

        function removeQuestion(id) {
            const el = document.getElementById(`question-${id}`);

            if (el) el.remove();
        }

        addQuestion();
    </script>
    </x-slot:scripts>

</x-layouts.teacher>
