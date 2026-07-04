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
        $subjects = Subject::where('created_by', auth()->id())->get(['id', 'name']);

        return view('teacher.question-sets.create', compact('subjects'));
    }

    protected function questionRules(): array
    {
        return [
            'title'                      => 'required|string|max:255',
            'time_limit_minutes'         => 'required|integer|min:1',
            'is_randomized'              => 'sometimes|boolean',
            'questions'                  => 'required|array|min:1',
            'questions.*.prompt'         => 'required|string',
            'questions.*.option_a'       => 'required|string',
            'questions.*.option_b'       => 'required|string',
            'questions.*.option_c'       => 'required|string',
            'questions.*.option_d'       => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
            'questions.*.marks'          => 'required|integer|min:1',
        ];
    }

    public function store(Request $request)
    {
        $teacherId = auth()->id();

        $validated = $request->validate(array_merge($this->questionRules(), [
            'subject_id' => ['required', Rule::exists('subjects', 'id')->where('created_by', $teacherId)],
        ]));

        DB::transaction(function () use ($validated, $teacherId) {
            $questionSet = QuestionSet::create([
                'created_by'         => $teacherId,
                'subject_id'         => $validated['subject_id'],
                'title'              => $validated['title'],
                'time_limit_minutes' => $validated['time_limit_minutes'],
                'is_randomized'      => $validated['is_randomized'] ?? false,
            ]);

            foreach ($validated['questions'] as $q) {
                $questionSet->questions()->create($q);
            }
        });

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set created successfully!');
    }

    public function edit(QuestionSet $questionSet)
    {
        abort_unless($questionSet->created_by === auth()->id(), 403);

        $questionSet->load('questions');
        $subjects = Subject::where('created_by', auth()->id())->get(['id', 'name']);
        $questions = $questionSet->questions;

        return view('teacher.question-sets.edit', compact('questionSet', 'subjects', 'questions'));
    }

    public function update(Request $request, QuestionSet $questionSet)
    {
        $teacherId = auth()->id();
        abort_unless($questionSet->created_by === $teacherId, 403);

        $validated = $request->validate(array_merge($this->questionRules(), [
            'subject_id' => ['required', Rule::exists('subjects', 'id')->where('created_by', $teacherId)],
        ]));

        DB::transaction(function () use ($questionSet, $validated) {
            $questionSet->update([
                'title'              => $validated['title'],
                'subject_id'         => $validated['subject_id'],
                'time_limit_minutes' => $validated['time_limit_minutes'],
                'is_randomized'      => $validated['is_randomized'] ?? false,
            ]);

            // Simplest safe approach: replace all questions on edit
            $questionSet->questions()->delete();

            foreach ($validated['questions'] as $q) {
                $questionSet->questions()->create($q);
            }
        });

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set updated successfully!');
    }

    public function destroy(QuestionSet $questionSet)
    {
        abort_unless($questionSet->created_by === auth()->id(), 403);

        if ($questionSet->attempts()->exists()) {
            return back()->withErrors([
                'questionSet' => 'Cannot delete a question set that already has student attempts.',
            ]);
        }

        $questionSet->delete();

        return redirect()->route('teacher.question-sets.index')
            ->with('success', 'Question set deleted successfully!');
    }
}