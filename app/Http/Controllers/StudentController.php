<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\UpdatesOwnProfile;
use App\Models\ExamAccess;
use App\Models\Attempt;
use App\Models\AttemptAnswer;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use UpdatesOwnProfile;

    public function dashboard()
    {
        $student = auth()->user();

        $enrolledClasses = $student->enrolledClasses()->get();
        $enrolledClass   = $enrolledClasses->first();
        $classIds        = $enrolledClasses->pluck('id');

        $examAccesses = ExamAccess::whereIn('class_id', $classIds)
            ->with(['questionSet.subject', 'questionSet.questions'])
            ->get();

        $upcomingCount = $examAccesses->filter(fn($ea) => $ea->isUpcoming())->count();

        $availableExams = $examAccesses
            ->filter(fn($ea) => ! $ea->isExpired())
            ->sortBy('scheduled_at')
            ->map(fn($ea) => (object) [
                'exam_access_id'     => $ea->id,
                'question_set_id'    => $ea->question_set_id,
                'subject'            => $ea->questionSet->subject->name ?? '—',
                'title'              => $ea->questionSet->title,
                'time_limit_minutes' => $ea->questionSet->time_limit_minutes,
                'total_marks'        => $ea->questionSet->questions->sum('marks'),
                'is_active'          => $ea->isActive(),
                'scheduled_at'       => $ea->scheduled_at,
            ])
            ->values();

        $completedAttempts = $student->attempts()
            ->whereIn('status', ['submitted', 'timed_out'])
            ->with('questionSet.subject')
            ->latest('submitted_at')
            ->get();

        $completedCount = $completedAttempts->count();
        $averageScore   = $completedCount
            ? round($completedAttempts->avg(fn($a) => $a->percentage()))
            : 0;

        $attemptHistory = $completedAttempts->take(5)->map(fn($attempt) => (object) [
            'subject'     => $attempt->questionSet->subject->name ?? '—',
            'title'       => $attempt->questionSet->title ?? '—',
            'date'        => $attempt->submitted_at,
            'score'       => $attempt->score,
            'total_marks' => $attempt->total_marks,
            'percentage'  => $attempt->percentage(),
        ]);

        return view('student.dashboard', compact(
            'enrolledClass',
            'upcomingCount',
            'completedCount',
            'averageScore',
            'availableExams',
            'attemptHistory'
        ));
    }

    public function courses()
    {
        $enrolledClass = auth()->user()->enrolledClasses()->first();

        return view('student.courses', compact('enrolledClass'));
    }

    public function enroll(Request $request)
    {
        $student = auth()->user();

        $validated = $request->validate([
            'class_code' => ['required', 'string'],
        ]);

        $class = SchoolClass::where('class_code', $validated['class_code'])->first();

        if (! $class) {
            return back()->withErrors([
                'class_code' => 'No class found with that code.',
            ])->withInput();
        }

        if ($student->enrolledClasses()->where('classes.id', $class->id)->exists()) {
            return back()->withErrors([
                'class_code' => 'You are already enrolled in this class.',
            ])->withInput();
        }

        $student->enrolledClasses()->attach($class->id);

        return redirect()->route('student.courses')
            ->with('success', "Successfully enrolled in {$class->name}!");
    }

    public function exams()
    {
        $student  = auth()->user();
        $classIds = $student->enrolledClasses()->pluck('classes.id');

        $exams = ExamAccess::whereIn('class_id', $classIds)
            ->with(['questionSet.subject', 'questionSet.questions'])
            ->orderBy('scheduled_at')
            ->get()
            ->map(fn($ea) => (object) [
                'id'                 => $ea->id,
                'subject'            => $ea->questionSet->subject->name ?? '—',
                'title'              => $ea->questionSet->title,
                'time_limit_minutes' => $ea->questionSet->time_limit_minutes,
                'total_marks'        => $ea->questionSet->questions->sum('marks'),
                'scheduled_at'       => $ea->scheduled_at,
                'expires_at'         => $ea->expires_at,
            ]);

        return view('student.exams', compact('exams'));
    }

    public function result()
    {
        $attempts = auth()->user()->attempts()
            ->whereIn('status', ['submitted', 'timed_out'])
            ->with('questionSet.subject')
            ->latest('submitted_at')
            ->get()
            ->map(fn($attempt) => (object) [
                'subject'      => $attempt->questionSet->subject->name ?? '—',
                'title'        => $attempt->questionSet->title ?? '—',
                'submitted_at' => $attempt->submitted_at,
                'score'        => $attempt->score,
                'total_marks'  => $attempt->total_marks,
                'percentage'   => $attempt->percentage(),
            ]);

        return view('student.result', compact('attempts'));
    }

    public function profile()
    {
        $enrolledClass = auth()->user()->enrolledClasses()->first();

        return view('student.profile', compact('enrolledClass'));
    }

    public function examTaking(ExamAccess $examAccess)
    {
        $student = auth()->user();

        $enrolledClassIds = $student->enrolledClasses()->pluck('classes.id');
        abort_unless($enrolledClassIds->contains($examAccess->class_id), 403);

        abort_unless($examAccess->isActive(), 403, 'This exam is not currently available.');

        $questionSet = $examAccess->questionSet;
        $questions   = $questionSet->questions;

        if ($questionSet->is_randomized) {
            $questions = $questions->shuffle();
        }

        $attempt = Attempt::firstOrCreate(
            [
                'student_id'      => $student->id,
                'question_set_id' => $questionSet->id,
                'status'          => 'in_progress',
            ],
            [
                'total_marks' => $questions->sum('marks'),
                'started_at'  => now(),
            ]
        );

        $exam = (object) [
            'exam_access_id'     => $examAccess->id,
            'title'              => $questionSet->title,
            'subject'            => $questionSet->subject->name ?? '—',
            'time_limit_minutes' => $questionSet->time_limit_minutes,
            'total_marks'        => $questions->sum('marks'),
        ];

        return view('student.exam-taking', compact('exam', 'questions', 'attempt'));
    }

    public function submitExam(Request $request, ExamAccess $examAccess)
    {
        $student = auth()->user();

        // ─── GATE 1: exam window must still be open ─────────────
        abort_unless($examAccess->isActive(), 403, 'This exam window has closed.');

        $attempt = Attempt::where('student_id', $student->id)
            ->where('question_set_id', $examAccess->question_set_id)
            ->where('status', 'in_progress')
            ->latest('started_at')
            ->firstOrFail();

        // ─── GATE 2: student's personal time limit must not be exceeded ─
        $deadline = $attempt->started_at->copy()
            ->addMinutes($examAccess->questionSet->time_limit_minutes);

        if (now()->gt($deadline)) {
            $attempt->update([
                'status'       => 'timed_out',
                'submitted_at' => now(),
            ]);

            return redirect()->route('student.result')
                ->with('error', 'Time limit exceeded — this attempt was marked as timed out.');
        }

        $answers = $request->input('answers', []);
        $score   = 0;

        foreach ($examAccess->questionSet->questions as $question) {
            $selected  = $answers[$question->id] ?? null;
            $isCorrect = $selected === $question->correct_answer;

            AttemptAnswer::create([
                'attempt_id'      => $attempt->id,
                'question_id'     => $question->id,
                'selected_option' => $selected,
                'is_correct'      => $isCorrect,
            ]);

            if ($isCorrect) {
                $score += $question->marks;
            }
        }

        $attempt->update([
            'score'        => $score,
            'status'       => 'submitted',
            'submitted_at' => now(),
        ]);

        return redirect()->route('student.result')
            ->with('success', 'Exam submitted! You scored ' . $score . ' out of ' . $attempt->total_marks . '.');
    }
}