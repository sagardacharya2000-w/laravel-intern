<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\ExamAccess;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalExams    = ExamAccess::count();
        $recentUsers   = User::latest()->take(5)->get();

        $activeExams = ExamAccess::with(['questionSet', 'schoolClass'])
            ->withCount('attempts')
            ->where('scheduled_at', '<=', now())
            ->where('expires_at', '>=', now())
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalExams',
            'recentUsers',
            'activeExams'
        ));
    }

    public function users(Request $request)
    {
        $search = $request->get('search');

        $users = User::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.users', compact('users', 'search'));
    }

    public function classes()
    {
        $classes = SchoolClass::with(['teacher'])
            ->withCount('students')
            ->latest()
            ->get();

        return view('admin.classes', compact('classes'));
    }
}
