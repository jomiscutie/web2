<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('studentList', compact('students'));
    }
    public function newStudent(Request $request)
    {
        $request->validate([
            'stdName' => 'required|max:3',
            'stdAge' => 'required|numeric',
        ]);

        $input['name'] = $request->stdName;
        $input['age'] = $request->stdAge;
        Students::create($input);

        return redirect()->route('std.index')->with('success', 'Student created successfully.');
    }
}