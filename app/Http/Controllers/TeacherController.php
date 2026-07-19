<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\UpdatesOwnProfile;

class TeacherController extends Controller
{
    use UpdatesOwnProfile;

    public function profile()
    {
        $teacher = auth()->user();

        $classes = $teacher->taughtClasses()
            ->withCount('students')
            ->latest()
            ->get();

        return view('teacher.profile', compact('teacher', 'classes'));
    }
}
