<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamAccess;
use App\Models\QuestionSet;
use App\Models\SchoolClass;
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
        $questionSets = QuestionSet::where('created_by', auth()->id())->get(['id', 'title']);
        $classes = SchoolClass::where('teacher_id', auth()->id())->get(['id', 'name']);

        return view('teacher.exam-access.create', compact('questionSets', 'classes'));
    }

    public function store(Request $request)
    {
        $teacherId = auth()->id();

        $validated = $request->validate([
            'question_set_id' => [
                'required',
                Rule::exists('question_sets', 'id')->where('created_by', $teacherId),
            ],
            'class_id' => [
                'required',
                Rule::exists('classes', 'id')->where('teacher_id', $teacherId),
            ],
            'scheduled_at' => 'required|date',
            'expires_at'   => 'required|date|after:scheduled_at',
        ]);

        $duplicate = ExamAccess::where('class_id', $validated['class_id'])
            ->where('question_set_id', $validated['question_set_id'])
            ->exists();

        if ($duplicate) {
            return back()->withErrors([
                'class_id' => 'This question set is already assigned to this class.',
            ])->withInput();
        }

        ExamAccess::create([
            ...$validated,
            'assigned_by' => $teacherId,
        ]);

        return redirect()->route('teacher.exam-access.index')
            ->with('success', 'Exam access created successfully!');
    }

    public function edit(ExamAccess $examAccess)
    {
        abort_unless($examAccess->questionSet->created_by === auth()->id(), 403);

        $questionSets = QuestionSet::where('created_by', auth()->id())->get(['id', 'title']);
        $classes = SchoolClass::where('teacher_id', auth()->id())->get(['id', 'name']);

        return view('teacher.exam-access.edit', compact('examAccess', 'questionSets', 'classes'));
    }

    public function update(Request $request, ExamAccess $examAccess)
    {
        $teacherId = auth()->id();
        abort_unless($examAccess->questionSet->created_by === $teacherId, 403);

        $validated = $request->validate([
            'question_set_id' => [
                'required',
                Rule::exists('question_sets', 'id')->where('created_by', $teacherId),
            ],
            'class_id' => [
                'required',
                Rule::exists('classes', 'id')->where('teacher_id', $teacherId),
            ],
            'scheduled_at' => 'required|date',
            'expires_at'   => 'required|date|after:scheduled_at',
        ]);

        $duplicate = ExamAccess::where('class_id', $validated['class_id'])
            ->where('question_set_id', $validated['question_set_id'])
            ->where('id', '!=', $examAccess->id)
            ->exists();

        if ($duplicate) {
            return back()->withErrors([
                'class_id' => 'This question set is already assigned to this class.',
            ])->withInput();
        }

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
}