<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\QuestionSet;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class QuestionSetController extends Controller
{
    public function index()
    {
        $questionSets = QuestionSet::where('created_by', auth()->id())
            ->with('subject')
            ->withCount(['questions', 'attempts'])
            ->latest()
            ->get();

        return view('teacher.question-sets.index', compact('questionSets'));
    }

    public function create()
    {
        $subjects = Subject::where('created_by', auth()->id())->get();

        return view('teacher.question-sets.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateQuestionSet($request);

        DB::transaction(function () use ($validated, $request) {
            $questionSet = QuestionSet::create([
                'created_by'         => auth()->id(),
                'subject_id'         => $validated['subject_id'],
                'title'              => $validated['title'],
                'time_limit_minutes' => $validated['time_limit_minutes'],
                'is_randomized'      => $request->boolean('is_randomized'),
            ]);

            foreach ($validated['questions'] as $question) {
                $questionSet->questions()->create($question);
            }
        });

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set created successfully!');
    }

    public function edit(QuestionSet $questionSet)
    {
        abort_unless($questionSet->created_by === auth()->id(), 403);

        $subjects  = Subject::where('created_by', auth()->id())->get();
        $questions = $questionSet->questions()->orderBy('id')->get();

        return view('teacher.question-sets.edit', compact('questionSet', 'subjects', 'questions'));
    }

    public function update(Request $request, QuestionSet $questionSet)
    {
        abort_unless($questionSet->created_by === auth()->id(), 403);

        $validated = $this->validateQuestionSet($request);

        DB::transaction(function () use ($validated, $request, $questionSet) {
            $questionSet->update([
                'subject_id'         => $validated['subject_id'],
                'title'              => $validated['title'],
                'time_limit_minutes' => $validated['time_limit_minutes'],
                'is_randomized'      => $request->boolean('is_randomized'),
            ]);

            $questionSet->questions()->delete();

            foreach ($validated['questions'] as $question) {
                $questionSet->questions()->create($question);
            }
        });

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set updated successfully!');
    }

    public function destroy(QuestionSet $questionSet)
    {
        abort_unless($questionSet->created_by === auth()->id(), 403);

        $questionSet->questions()->delete();
        $questionSet->delete();

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set deleted successfully!');
    }

    private function validateQuestionSet(Request $request): array
    {
        return $request->validate([
            'title'                      => ['required', 'string', 'max:255'],
            'subject_id'                 => [
                'required',
                Rule::exists('subjects', 'id')->where('created_by', auth()->id()),
            ],
            'time_limit_minutes'         => ['required', 'integer', 'min:1'],
            'questions'                  => ['required', 'array', 'min:1'],
            'questions.*.prompt'         => ['required', 'string'],
            'questions.*.option_a'       => ['required', 'string'],
            'questions.*.option_b'       => ['required', 'string'],
            'questions.*.option_c'       => ['required', 'string'],
            'questions.*.option_d'       => ['required', 'string'],
            'questions.*.correct_answer' => ['required', 'in:A,B,C,D'],
            'questions.*.marks'          => ['required', 'integer', 'min:1'],
        ]);
    }
}
