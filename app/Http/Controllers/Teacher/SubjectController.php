<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // List all subjects created by this teacher
    public function index()
    {
        $subjects = Subject::where('created_by', auth()->id())
            ->withCount('questionSets')
            ->latest()
            ->get();

        return view('teacher.subjects.index', compact('subjects'));
    }

    // Show create form
    public function create()
    {
        return view('teacher.subjects.create');
    }

    // Store new subject
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create([
            'created_by'  => auth()->id(),
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.subjects.index')
            ->with('success', 'Subject created successfully!');
    }

    // Show edit form
    public function edit(Subject $subject)
    {
        // Make sure teacher can only edit their own subject
        abort_unless($subject->created_by === auth()->id(), 403);

        return view('teacher.subjects.edit', compact('subject'));
    }

    // Update subject
    public function update(Request $request, Subject $subject)
    {
        abort_unless($subject->created_by === auth()->id(), 403);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.subjects.index')
            ->with('success', 'Subject updated successfully!');
    }

    // Delete subject
    public function destroy(Subject $subject)
    {
        abort_unless($subject->created_by === auth()->id(), 403);

        $subject->delete();

        return redirect()->route('teacher.subjects.index')
            ->with('success', 'Subject deleted successfully!');
    }
}
