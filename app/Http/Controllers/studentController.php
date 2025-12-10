<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('nim', 'like', "%{$search}%");
        })->paginate(10);

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date',
            'class' => 'required|string|max:255',
            'nim' => 'required|string|unique:students,nim|max:255',
            'section' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            'pickup_code' => 'required|string|unique:students,pickup_code|max:255',
            'address' => 'nullable|string|max:255',
            
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
            'gender' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date',
            'class' => 'required',
            'nim' => 'required',
            'section' => 'required',
            'parent_name' => 'required',
            'parent_contact' => 'required',
            'parent_email' => 'required|email',
            'address' => 'nullable|string|max:255',
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
