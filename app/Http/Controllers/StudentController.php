<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        // ── DUMMY DATA — backend will replace with real DB queries ──

        $enrolledClass = (object)[
            'name'       => 'Grade 10 Section A',
            'class_code' => 'G10A2026',
        ];

        // Stat cards
        $upcomingCount  = 2;
        $completedCount = 5;
        $averageScore   = 78;

        // Available Exams — card grid
        $availableExams = collect([
            (object)[
                'subject'             => 'Mathematics',
                'title'               => 'Algebra Mid-term',
                'time_limit_minutes'  => 30,
                'total_marks'         => 20,
                'is_active'           => true,
                'scheduled_at'        => now()->subHour(),
            ],
            (object)[
                'subject'             => 'Science',
                'title'               => 'Chapter 5 Quiz',
                'time_limit_minutes'  => 20,
                'total_marks'         => 16,
                'is_active'           => false,
                'scheduled_at'        => now()->addHours(3),
            ],
        ]);

        // Attempt History table
        $attemptHistory = collect([
            (object)[
                'subject'     => 'English',
                'title'       => 'Grammar Quiz',
                'date'        => now()->subDays(2),
                'score'       => 12,
                'total_marks' => 15,
                'percentage'  => 80,
            ],
            (object)[
                'subject'     => 'Mathematics',
                'title'       => 'Geometry Basics',
                'date'        => now()->subDays(5),
                'score'       => 7,
                'total_marks' => 10,
                'percentage'  => 70,
            ],
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
        return view('student.courses');
    }

    public function exams()
    {
        return view('student.exams');
    }

    public function result()
    {
        return view('student.result');
    }

    public function profile()
    {
        return view('student.profile');
    }
}
