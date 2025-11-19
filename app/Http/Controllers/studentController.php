<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('students.create');
    }

    // Store student
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'class'          => 'required|string|max:255',
            'section'        => 'required|string|max:255',
            'parent_name'    => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email'   => 'required|email|max:255',
            'pickup_code'    => 'required|string|max:255|unique:students,pickup_code',
        ]);

        $student = new Student();
        $student->name           = $request->name;
        $student->class          = $request->class;
        $student->section        = $request->section;
        $student->parent_name    = $request->parent_name;
        $student->parent_contact = $request->parent_contact;
        $student->parent_email   = $request->parent_email;
        $student->pickup_code    = $request->pickup_code;
        $student->save();

        return redirect()->route('students.index');
    }

    // Show edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'class'          => 'required|string|max:255',
            'section'        => 'required|string|max:255',
            'parent_name'    => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email'   => 'required|email|max:255',
            'pickup_code'    => "required|string|max:255|unique:students,pickup_code,$id",
        ]);

        $student = Student::findOrFail($id);
        $student->name           = $request->name;
        $student->class          = $request->class;
        $student->section        = $request->section;
        $student->parent_name    = $request->parent_name;
        $student->parent_contact = $request->parent_contact;
        $student->parent_email   = $request->parent_email;
        $student->pickup_code    = $request->pickup_code;
        $student->save();

        return redirect()->route('students.index');
    }

    // Delete student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}