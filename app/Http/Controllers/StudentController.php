<?php

namespace App\Http\Controllers;

use App\Models\ExamAccess;

class StudentController extends Controller
{
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
        return view('student.profile');
    }
}
