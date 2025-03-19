<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    // Display list of students
    public function index()
    {
        $students = Students::orderBy('id', 'asc')->get();
        return view('studentList', compact('students'));
    }

    // Store a new student
    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:3',
        ]);

        Students::create([
            'name' => $request->name,
            'age' => $request->age,
        ]);

        return redirect()->route('std.index')->with('success', 'Student created successfully.');
    }

    // Update student details
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:3',
        ]);

        $student = Students::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age,
        ]);

        return redirect()->route('std.index')->with('success', 'Student updated successfully.');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return redirect()->route('std.index')->with('success', 'Student deleted successfully.');
    }
}
