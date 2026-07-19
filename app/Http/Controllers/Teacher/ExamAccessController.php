<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamAccess;
use App\Models\QuestionSet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExamAccessController extends Controller
{
    public function index()
    {
        $examAccesses = ExamAccess::whereHas('questionSet', function ($q) {
            $q->where('created_by', auth()->id());
        })
            ->with(['questionSet', 'schoolClass'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('teacher.exam-access.index', compact('examAccesses'));
    }

    public function create()
    {
        $questionSets = QuestionSet::where('created_by', auth()->id())->get();
        $classes      = auth()->user()->taughtClasses()->get();

        return view('teacher.exam-access.create', compact('questionSets', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateExamAccess($request);

        ExamAccess::create($validated);

        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access created successfully!');
    }

    public function edit(ExamAccess $examAccess)
    {
        abort_unless($examAccess->questionSet->created_by === auth()->id(), 403);

        $questionSets = QuestionSet::where('created_by', auth()->id())->get();
        $classes      = auth()->user()->taughtClasses()->get();

        return view('teacher.exam-access.edit', compact('examAccess', 'questionSets', 'classes'));
    }

    public function update(Request $request, ExamAccess $examAccess)
    {
        abort_unless($examAccess->questionSet->created_by === auth()->id(), 403);

        $validated = $this->validateExamAccess($request);

        $examAccess->update($validated);

        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access updated successfully!');
    }

    public function destroy(ExamAccess $examAccess)
    {
        abort_unless($examAccess->questionSet->created_by === auth()->id(), 403);

        $examAccess->delete();

        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access deleted successfully!');
    }


    private function validateExamAccess(Request $request): array
    {
        return $request->validate([
            'question_set_id' => [
                'required',
                Rule::exists('question_sets', 'id')->where('created_by', auth()->id()),
            ],
            'class_id' => [
                'required',
                Rule::exists('classes', 'id')->where('teacher_id', auth()->id()),
            ],
            'scheduled_at' => ['required', 'date'],
            'expires_at'   => ['required', 'date', 'after:scheduled_at'],
        ]);
    }
}
