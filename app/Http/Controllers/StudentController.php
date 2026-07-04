<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $enrolledClass = (object)[
            'name'       => 'Grade 10 Section A',
            'class_code' => 'G10A2026',
        ];

        $upcomingCount  = 2;
        $completedCount = 5;
        $averageScore   = 78;

        $availableExams = collect([
            (object)[
                'subject'            => 'Mathematics',
                'title'              => 'Algebra Mid-term',
                'time_limit_minutes' => 30,
                'total_marks'        => 20,
                'is_active'          => true,
                'scheduled_at'       => now()->subHour(),
            ],
            (object)[
                'subject'            => 'Science',
                'title'              => 'Chapter 5 Quiz',
                'time_limit_minutes' => 20,
                'total_marks'        => 16,
                'is_active'          => false,
                'scheduled_at'       => now()->addHours(3),
            ],
        ]);

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
        // dummy enrolled class
        $enrolledClass = (object)[
            'name'       => 'Grade 10 Section A',
            'class_code' => 'G10A2026',
        ];

        return view('student.courses', compact('enrolledClass'));
    }

    public function exams()
    {
        // dummy exams for student's enrolled class
        $exams = collect([
            (object)[
                'id'                 => 1,
                'subject'            => 'Mathematics',
                'title'              => 'Algebra Mid-term',
                'time_limit_minutes' => 30,
                'total_marks'        => 20,
                'scheduled_at'       => now()->subHour(),
                'expires_at'         => now()->addHour(),
            ],
            (object)[
                'id'                 => 2,
                'subject'            => 'Science',
                'title'              => 'Chapter 5 Quiz',
                'time_limit_minutes' => 20,
                'total_marks'        => 16,
                'scheduled_at'       => now()->addDay(),
                'expires_at'         => now()->addDays(2),
            ],
            (object)[
                'id'                 => 3,
                'subject'            => 'English',
                'title'              => 'Grammar Test',
                'time_limit_minutes' => 25,
                'total_marks'        => 15,
                'scheduled_at'       => now()->subDays(3),
                'expires_at'         => now()->subDays(2),
            ],
        ]);

        return view('student.exams', compact('exams'));
    }

    public function result()
    {
        // dummy attempt history
        $attempts = collect([
            (object)[
                'subject'      => 'English',
                'title'        => 'Grammar Quiz',
                'submitted_at' => now()->subDays(2),
                'score'        => 12,
                'total_marks'  => 15,
                'percentage'   => 80,
            ],
            (object)[
                'subject'      => 'Mathematics',
                'title'        => 'Geometry Basics',
                'submitted_at' => now()->subDays(5),
                'score'        => 7,
                'total_marks'  => 10,
                'percentage'   => 70,
            ],
            (object)[
                'subject'      => 'Science',
                'title'        => 'Chapter 3 Test',
                'submitted_at' => now()->subDays(8),
                'score'        => 18,
                'total_marks'  => 20,
                'percentage'   => 90,
            ],
        ]);

        return view('student.result', compact('attempts'));
    }

    public function profile()
    {
        // uses auth()->user() directly in blade — no dummy data needed
        return view('student.profile');
    }
}
