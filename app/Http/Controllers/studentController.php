<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }


    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            'pickup_code' => 'required|string|unique:students,pickup_code|max:255',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'section' => 'required',
            'parent_name' => 'required',
            'parent_contact' => 'required',
            'parent_email' => 'required|email',
            'pickup_code' => 'required|unique:students,pickup_code,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
