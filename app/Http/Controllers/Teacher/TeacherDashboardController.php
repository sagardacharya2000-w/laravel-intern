<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\QuestionSet;
use App\Models\ExamAccess;
use App\Models\Attempt;
use Carbon\Carbon;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher = auth()->user();

        // Total students across all classes this teacher teaches
        $totalStudents = $teacher->taughtClasses()
            ->withCount('students')
            ->get()
            ->sum('students_count');

        // Total classes this teacher is assigned to
        $totalClasses = $teacher->taughtClasses()->count();

        // Total question sets created by this teacher
        $totalQuestionSets = QuestionSet::where('created_by', $teacher->id)->count();

        // Active/upcoming exams for this teacher's question sets
        $pendingExams = ExamAccess::whereHas('questionSet', function ($q) use ($teacher) {
                $q->where('created_by', $teacher->id);
            })
            ->where('expires_at', '>=', Carbon::now())
            ->count();

        // Classes with student count (max 6 shown)
        $classes = $teacher->taughtClasses()
            ->withCount('students')
            ->take(6)
            ->get();

        // Recent submitted attempts for this teacher's question sets
        $recentAttempts = Attempt::whereHas('questionSet', function ($q) use ($teacher) {
                $q->where('created_by', $teacher->id);
            })
            ->with(['student', 'questionSet'])
            ->whereNotNull('submitted_at')
            ->orderBy('submitted_at', 'desc')
            ->take(5)
            ->get();

        // My Question Sets — most recent, with subject + question/attempt counts
        $questionSets = QuestionSet::where('created_by', $teacher->id)
            ->with('subject')
            ->withCount(['questions', 'attempts'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Exam Schedule — exam_access entries for this teacher's question sets
        $examSchedule = ExamAccess::whereHas('questionSet', function ($q) use ($teacher) {
                $q->where('created_by', $teacher->id);
            })
            ->with(['questionSet', 'schoolClass'])
            ->orderBy('scheduled_at', 'desc')
            ->take(6)
            ->get();

        // Class Results — per class, submitted attempt count + average percentage
        $classResults = $teacher->taughtClasses()
            ->with('students:id')
            ->get()
            ->map(function ($class) use ($teacher) {
                $studentIds = $class->students->pluck('id');

                $attempts = Attempt::whereIn('student_id', $studentIds)
                    ->whereHas('questionSet', function ($q) use ($teacher) {
                        $q->where('created_by', $teacher->id);
                    })
                    ->whereNotNull('submitted_at')
                    ->get();

                return [
                    'class' => $class,
                    'attempts_count' => $attempts->count(),
                    'average_percentage' => $attempts->count()
                        ? round($attempts->avg(fn ($a) => $a->percentage()), 2)
                        : 0,
                ];
            });

        return view('teacher.dashboard', compact(
            'teacher',
            'totalStudents',
            'totalClasses',
            'totalQuestionSets',
            'pendingExams',
            'classes',
            'recentAttempts',
            'questionSets',
            'examSchedule',
            'classResults'
        ));
    }
}
