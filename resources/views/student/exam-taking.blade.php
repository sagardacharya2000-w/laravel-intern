<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $exam->title }} — Online Siksha</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fb;
            color: #1f2937;
        }

        .exam-header {
            position: sticky;
            top: 0;
            z-index: 999;
            background: #fff;
            border-bottom: 1px solid #eef0f3;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .exam-header-left h1 { font-size: 16px; font-weight: 700; color: #111827; }
        .exam-header-left p { font-size: 12px; color: #6b7280; margin-top: 2px; }

        .exam-timer {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 8px 16px;
            border-radius: 10px;
        }

        .exam-timer.warning { animation: pulse-warn 1s infinite; }

        @keyframes pulse-warn {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .exam-timer i { color: #dc2626; font-size: 18px; }

        .exam-timer-digits {
            font-family: 'Sora', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #dc2626;
            letter-spacing: 1px;
        }

        .exam-main { max-width: 760px; margin: 0 auto; padding: 32px 20px 100px; }

        .exam-question-card {
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 20px;
        }

        .exam-q-number {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 999px;
            margin-bottom: 14px;
        }

        .exam-q-prompt {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .exam-options { display: flex; flex-direction: column; gap: 10px; }

        .exam-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.15s;
        }

        .exam-option:hover { border-color: #c7d2fe; background: #f9fafb; }
        .exam-option.selected { border-color: #4338ca; background: #eef2ff; }

        .exam-option input[type="radio"] {
            width: 18px; height: 18px;
            accent-color: #4338ca;
            cursor: pointer;
        }

        .exam-option-letter {
            width: 26px; height: 26px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 700; color: #6b7280;
            flex-shrink: 0;
        }

        .exam-option.selected .exam-option-letter { background: #4338ca; color: #fff; }

        .exam-option-text { font-size: 14px; color: #374151; font-weight: 500; }

        .exam-footer {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: #fff;
            border-top: 1px solid #eef0f3;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .exam-footer-info { font-size: 13px; color: #6b7280; }

        .exam-submit-btn {
            background: #4338ca;
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .exam-submit-btn:hover { background: #3730a3; }

        .exam-modal-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .exam-modal-overlay.open { display: flex; }

        .exam-modal {
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            max-width: 380px;
            width: 90%;
            text-align: center;
        }

        .exam-modal-icon {
            width: 56px; height: 56px;
            background: #fef3c7;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
        }

        .exam-modal-icon i { font-size: 26px; color: #d97706; }

        .exam-modal h3 { font-size: 17px; font-weight: 700; color: #111827; margin-bottom: 8px; }
        .exam-modal p { font-size: 14px; color: #6b7280; margin-bottom: 24px; line-height: 1.6; }

        .exam-modal-btns { display: flex; gap: 10px; }

        .exam-modal-btn {
            flex: 1;
            padding: 11px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .exam-modal-cancel { background: #f3f4f6; color: #374151; }
        .exam-modal-confirm { background: #4338ca; color: #fff; }

        @media (max-width: 640px) {
            .exam-header { padding: 12px 16px; flex-wrap: wrap; gap: 10px; }
            .exam-footer { padding: 12px 16px; }
        }
    </style>
</head>
<body>

    <div class="exam-header">
        <div class="exam-header-left">
            <h1>{{ $exam->title }}</h1>
            <p>{{ $exam->subject }} · {{ $questions->count() }} questions · {{ $exam->total_marks }} marks</p>
        </div>
        <div class="exam-timer" id="examTimer">
            <i class="ti ti-clock"></i>
            <span class="exam-timer-digits" id="timerDisplay">--:--</span>
        </div>
    </div>

    <form id="examForm" method="POST" action="{{ route('student.exam-taking.submit', $exam->exam_access_id) }}">
        @csrf

        <div class="exam-main">
            @foreach($questions as $index => $question)
            <div class="exam-question-card">
                <div class="exam-q-number">Question {{ $index + 1 }} of {{ $questions->count() }} · {{ $question->marks }} marks</div>
                <div class="exam-q-prompt">{{ $question->prompt }}</div>

                <div class="exam-options">
                    @foreach(['a' => $question->option_a, 'b' => $question->option_b, 'c' => $question->option_c, 'd' => $question->option_d] as $letter => $text)
                    <label class="exam-option" onclick="selectOption(this)">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ strtoupper($letter) }}">
                        <span class="exam-option-letter">{{ strtoupper($letter) }}</span>
                        <span class="exam-option-text">{{ $text }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="exam-footer">
            <div class="exam-footer-info">
                <span id="answeredCount">0</span> of {{ $questions->count() }} answered
            </div>
            <button type="button" class="exam-submit-btn" onclick="openConfirmModal()">
                <i class="ti ti-send"></i> Submit Exam
            </button>
        </div>
    </form>

    <div class="exam-modal-overlay" id="confirmModal">
        <div class="exam-modal">
            <div class="exam-modal-icon"><i class="ti ti-alert-triangle"></i></div>
            <h3>Submit this exam?</h3>
            <p id="modalText">You can't change your answers after submitting. Are you sure you want to continue?</p>
            <div class="exam-modal-btns">
                <button type="button" class="exam-modal-btn exam-modal-cancel" onclick="closeConfirmModal()">Cancel</button>
                <button type="button" class="exam-modal-btn exam-modal-confirm" onclick="submitNow()">Yes, Submit</button>
            </div>
        </div>
    </div>

    <script>
        function selectOption(label) {
            const card = label.closest('.exam-question-card');
            card.querySelectorAll('.exam-option').forEach(opt => opt.classList.remove('selected'));
            label.classList.add('selected');
            updateAnsweredCount();
        }

        function updateAnsweredCount() {
            const total = document.querySelectorAll('input[type="radio"]:checked').length;
            document.getElementById('answeredCount').textContent = total;
        }

        function openConfirmModal() {
            const answered = document.querySelectorAll('input[type="radio"]:checked').length;
            const total = {{ $questions->count() }};
            const modalText = document.getElementById('modalText');

            modalText.textContent = answered < total
                ? `You've only answered ${answered} of ${total} questions. Unanswered questions will be marked wrong. Submit anyway?`
                : "You can't change your answers after submitting. Are you sure you want to continue?";

            document.getElementById('confirmModal').classList.add('open');
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').classList.remove('open');
        }

        let submitting = false;
        function submitNow() {
            submitting = true;
            document.getElementById('examForm').submit();
        }

        // ── COUNTDOWN TIMER ────────────────────────────────────────────────
        // started_at comes from the real Attempt record — so the timer is
        // accurate even if the student refreshes or reopens the exam
        const startedAt = new Date("{{ $attempt->started_at->toISOString() }}").getTime();
        const limitSeconds = {{ $exam->time_limit_minutes * 60 }};

        const timerDisplay = document.getElementById('timerDisplay');
        const timerBox = document.getElementById('examTimer');

        function tick() {
            const elapsed = Math.floor((Date.now() - startedAt) / 1000);
            let remaining = limitSeconds - elapsed;

            if (remaining <= 0) {
                remaining = 0;
                timerDisplay.textContent = '00:00';
                if (!submitting) submitNow();
                return;
            }

            const m = Math.floor(remaining / 60);
            const s = remaining % 60;
            timerDisplay.textContent = m.toString().padStart(2, '0') + ':' + s.toString().padStart(2, '0');

            if (remaining <= 120) timerBox.classList.add('warning');
        }

        tick();
        const countdown = setInterval(tick, 1000);

        window.addEventListener('beforeunload', function (e) {
            if (submitting) return;
            e.preventDefault();
            e.returnValue = '';
        });
    </script>

</body>
</html>
