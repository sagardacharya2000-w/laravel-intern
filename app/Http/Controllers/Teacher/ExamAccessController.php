<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamAccessController extends Controller
// NOTE: no DB imports — dummy data only
{

    public function index()
    {
        $examAccesses = collect([
            (object)[
                'id'           => 1,
                'questionSet'  => (object)['title' => 'Algebra Mid-term'],
                'schoolClass'  => (object)['name'  => 'Grade 10 Section A'],
                'scheduled_at' => now()->subHour(),
                'expires_at'   => now()->addHour(),
            ],
            (object)[
                'id'           => 2,
                'questionSet'  => (object)['title' => 'Science Chapter 5'],
                'schoolClass'  => (object)['name'  => 'Grade 9 Section B'],
                'scheduled_at' => now()->addDay(),
                'expires_at'   => now()->addDays(2),
            ],
            (object)[
                'id'           => 3,
                'questionSet'  => (object)['title' => 'English Grammar Quiz'],
                'schoolClass'  => (object)['name'  => 'Grade 10 Section A'],
                'scheduled_at' => now()->subDays(3),
                'expires_at'   => now()->subDays(2),
            ],
        ]);

        return view('teacher.exam-access.index', compact('examAccesses'));
    }


    public function create()
    {
        $questionSets = collect([

            (object)['id' => 1, 'title' => 'Algebra Mid-term'],
            (object)['id' => 2, 'title' => 'Science Chapter 5'],
            (object)['id' => 3, 'title' => 'English Grammar Quiz'],
        ]);

        $classes = collect([

            (object)['id' => 1, 'name' => 'Grade 10 Section A'],
            (object)['id' => 2, 'name' => 'Grade 9 Section B'],
        ]);

        return view('teacher.exam-access.create', compact('questionSets', 'classes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question_set_id' => 'required',
            'class_id'        => 'required',
            'scheduled_at'    => 'required|date',
            'expires_at'      => 'required|date|after:scheduled_at',

        ]);



        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access created! (dummy — backend will save to DB)');
    }


    public function edit($examAccess)
    {
        $examAccess = (object)[
            'id'              => $examAccess,
            // use URL id so form action URL stays correct
            'question_set_id' => 1,
            'class_id'        => 1,
            'scheduled_at'    => now()->subHour(),
            'expires_at'      => now()->addHour(),
        ];

        $questionSets = collect([
            (object)['id' => 1, 'title' => 'Algebra Mid-term'],
            (object)['id' => 2, 'title' => 'Science Chapter 5'],
            (object)['id' => 3, 'title' => 'English Grammar Quiz'],
        ]);

        $classes = collect([
            (object)['id' => 1, 'name' => 'Grade 10 Section A'],
            (object)['id' => 2, 'name' => 'Grade 9 Section B'],
        ]);

        return view('teacher.exam-access.edit', compact('examAccess', 'questionSets', 'classes'));
    }


    public function update(Request $request, $examAccess)
    {
        $request->validate([
            'question_set_id' => 'required',
            'class_id'        => 'required',
            'scheduled_at'    => 'required|date',
            'expires_at'      => 'required|date|after:scheduled_at',
        ]);

        // no DB update — backend will add real update logic
        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access updated! (dummy — backend will update DB)');
    }


    public function destroy($examAccess)
    {
        // no DB delete — backend will add real delete logic
        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access deleted! (dummy — backend will delete from DB)');
    }
}
