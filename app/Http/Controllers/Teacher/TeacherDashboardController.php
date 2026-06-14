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

        $totalStudents = $teacher->taughtClasses()
            ->withCount('students')->get()->sum('students_count');

        $totalClasses = $teacher->taughtClasses()->count();

        $totalQuestionSets = QuestionSet::where('created_by', $teacher->id)->count();

        $pendingExams = ExamAccess::whereHas('questionSet', fn($q) => $q->where('created_by', $teacher->id))
            ->where('expires_at', '>=', Carbon::now())->count();

        $classes = $teacher->taughtClasses()
            ->withCount('students')
            ->take(6)->get();

        $recentAttempts = Attempt::whereHas('questionSet', fn($q) => $q->where('created_by', $teacher->id))
            ->with(['student', 'questionSet'])
            ->orderBy('submitted_at', 'desc')
            ->take(5)->get();

        return view('teacher.dashboard', compact(
            'teacher', 'totalStudents', 'totalClasses',
            'totalQuestionSets', 'pendingExams', 'classes', 'recentAttempts'
        ));
    }
}