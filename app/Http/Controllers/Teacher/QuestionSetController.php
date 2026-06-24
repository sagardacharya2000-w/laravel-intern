<?php

namespace App\Http\Controllers\Teacher;
// this file belongs to the Teacher subfolder — must match folder structure

use App\Http\Controllers\Controller;
// base controller all controllers extend from

use Illuminate\Http\Request;
// handles incoming form data for validation

class QuestionSetController extends Controller
// NOTE: no DB model imports needed — using dummy data only

{
    public function index()
    {
        $questionSets = collect([

            (object)[
                'id'                 => 1,
                'title'              => 'Algebra Mid-term',
                'subject'            => (object)['name' => 'Mathematics'],
                'questions_count'    => 10,
                'time_limit_minutes' => 30,
                'is_randomized'      => true,
                'attempts_count'     => 12,
            ],
            (object)[
                'id'                 => 2,
                'title'              => 'Science Chapter 5',
                'subject'            => (object)['name' => 'Science'],
                'questions_count'    => 8,
                'time_limit_minutes' => 20,
                'is_randomized'      => false,
                'attempts_count'     => 5,
            ],
            (object)[
                'id'                 => 3,
                'title'              => 'English Grammar Quiz',
                'subject'            => (object)['name' => 'English'],
                'questions_count'    => 15,
                'time_limit_minutes' => 45,
                'is_randomized'      => true,
                'attempts_count'     => 0,
            ],
        ]);

        return view('teacher.question-sets.index', compact('questionSets'));
    }

    public function create()
    {
        $subjects = collect([
            (object)['id' => 1, 'name' => 'Mathematics'],
            (object)['id' => 2, 'name' => 'Science'],
            (object)['id' => 3, 'name' => 'English'],
        ]);

        return view('teacher.question-sets.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                      => 'required|string|max:255',
            'subject_id'                 => 'required',
            'time_limit_minutes'         => 'required|integer|min:1',
            'questions'                  => 'required|array|min:1',
            'questions.*.prompt'         => 'required|string',
            'questions.*.option_a'       => 'required|string',
            'questions.*.option_b'       => 'required|string',
            'questions.*.option_c'       => 'required|string',
            'questions.*.option_d'       => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
            'questions.*.marks'          => 'required|integer|min:1',
        ]);

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set created! (dummy — backend will save to DB)');
    }

    public function edit($questionSet)
    {
        $questionSet = (object)[
            'id'                 => $questionSet,
            'title'              => 'Algebra Mid-term',
            'subject_id'         => 1,
            'time_limit_minutes' => 30,
            'is_randomized'      => true,
        ];

        $subjects = collect([
            (object)['id' => 1, 'name' => 'Mathematics'],
            (object)['id' => 2, 'name' => 'Science'],
            (object)['id' => 3, 'name' => 'English'],
        ]);

        $questions = collect([
            (object)[
                'prompt'         => 'What is 2 + 2?',
                'option_a'       => '3',
                'option_b'       => '4',
                'option_c'       => '5',
                'option_d'       => '6',
                'correct_answer' => 'B',
                'marks'          => 1,
            ],
            (object)[
                'prompt'         => 'What is the square root of 16?',
                'option_a'       => '2',
                'option_b'       => '3',
                'option_c'       => '4',
                'option_d'       => '5',
                'correct_answer' => 'C',
                'marks'          => 2,
            ],
        ]);

        return view('teacher.question-sets.edit', compact('questionSet', 'subjects', 'questions'));
    }

    public function update(Request $request, $questionSet)
    {
        $request->validate([
            'title'                      => 'required|string|max:255',
            'subject_id'                 => 'required',
            'time_limit_minutes'         => 'required|integer|min:1',
            'questions'                  => 'required|array|min:1',
            'questions.*.prompt'         => 'required|string',
            'questions.*.option_a'       => 'required|string',
            'questions.*.option_b'       => 'required|string',
            'questions.*.option_c'       => 'required|string',
            'questions.*.option_d'       => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
            'questions.*.marks'          => 'required|integer|min:1',
        ]);

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set updated! (dummy — backend will update DB)');
    }


    public function destroy($questionSet)
    {

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set deleted! (dummy — backend will delete from DB)');
    }
}
