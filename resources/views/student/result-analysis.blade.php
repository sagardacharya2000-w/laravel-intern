<x-student>

    <x-slot name="title">Result Analysis — Online Siksha</x-slot>
    <x-slot name="pageTitle">Result Analysis</x-slot>

    <div class="panel">
        <div class="panel-header">
            <h3>{{ $attempt->questionSet->title }}</h3>
        </div>

        <div style="padding:20px 24px;">
            <p style="margin:0;color:#6b7280;font-size:14px;">
                Subject:
                <strong style="color:#111827;">
                    {{ $attempt->questionSet->subject->name ?? '—' }}
                </strong>
            </p>
        </div>
    </div>

    <div class="stat-grid">

        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-trophy"></i> Score
            </div>
            <div class="stat-value">
                {{ $attempt->score }}/{{ $attempt->total_marks }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-percentage"></i> Percentage
            </div>
            <div class="stat-value">
                {{ $attempt->percentage() }}%
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-circle-check"></i> Correct
            </div>
            <div class="stat-value">
                {{ $correctAnswers }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">
                <i class="ti ti-x"></i> Wrong
            </div>
            <div class="stat-value">
                {{ $wrongAnswers }}
            </div>
        </div>

    </div>

    <div class="panel">

        <div class="panel-header">
            <h3>Question Analysis</h3>
        </div>

        <div style="padding:20px 24px;">

            @foreach($answers as $index => $answer)

                <div style="padding:18px 0;border-bottom:1px solid #e5e7eb;">

                    <div style="font-weight:700;color:#111827;margin-bottom:10px;">
                        Question {{ $index + 1 }}
                    </div>

                    <div style="font-size:14px;color:#374151;margin-bottom:12px;">
                        {{ $answer->question->question_text }}
                    </div>

                    <div style="font-size:13px;margin-bottom:8px;">
                        <strong>Your Answer:</strong>

                        @if($answer->selected_option)
                            {{ $answer->selected_option }}
                        @else
                            <span style="color:#9ca3af;">
                                Not Answered
                            </span>
                        @endif
                    </div>

                    <div style="font-size:13px;margin-bottom:10px;">
                        <strong>Correct Answer:</strong>
                        {{ $answer->question->correct_answer }}
                    </div>

                    @if($answer->is_correct)
                        <span class="badge badge-green">
                            ✓ Correct
                        </span>
                    @else
                        <span class="badge badge-gray">
                            ✗ Wrong
                        </span>
                    @endif

                </div>

            @endforeach

        </div>

    </div>

    <div style="margin-top:20px;">
        <a href="{{ route('student.result') }}" class="btn-secondary">
            ← Back to Results
        </a>
    </div>

</x-student>
