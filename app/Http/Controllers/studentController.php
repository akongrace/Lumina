<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentController extends Controller
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
            
        ]);

        Student::create($request->only([
            'name',
            'class',
            'section',
            'parent_name',
            'parent_contact',
            'parent_email',
            'pickup_code',
        ]));

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            
        ]);

        $student->update($request->only([
            'name',
            'class',
            'section',
            'parent_name',
            'parent_contact',
            'parent_email',
        ]));

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    

}
