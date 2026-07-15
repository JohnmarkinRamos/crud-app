<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('subjects')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $subjects = Subject::orderBy('subject_name')->get();

        return view('students.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email',
            'course'     => 'required|string|max:255',
            'year_level' => 'required|integer|min:1|max:6',
            'subjects'   => 'required|array|min:1',
            'subjects.*' => 'integer|exists:subjects,id_subjectname',
        ]);

        $student = Student::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'course' => $validated['course'],
            'year_level' => $validated['year_level'],
        ]);

        $student->subjects()->sync($validated['subjects']);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        $student->load('subjects');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $student->load('subjects');
        $subjects = Subject::orderBy('subject_name')->get();

        return view('students.edit', compact('student', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email,' . $student->id,
            'course'     => 'required|string|max:255',
            'year_level' => 'required|integer|min:1|max:6',
            'subjects'   => 'required|array|min:1',
            'subjects.*' => 'integer|exists:subjects,id_subjectname',
        ]);

        $student->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'course' => $validated['course'],
            'year_level' => $validated['year_level'],
        ]);

        $student->subjects()->sync($validated['subjects']);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}