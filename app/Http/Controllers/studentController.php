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
            $query->where('student_name', 'like', "%{$search}%")
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
        $validated = $request->validate([
            'student_name'   => 'required|string|max:255',
            'gender'         => 'nullable|string|max:50',
            'date_of_birth'  => 'nullable|date',
            'class'          => 'required|string|max:255',
            'class_section'  => 'required|string|max:255',
            'nim'            => 'required|string|unique:students,nim|max:255',
            'parent_name'    => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email'   => 'required|email|max:255',
            'pickup_code'    => 'required|string|unique:students,pickup_code|max:255',
            'address'        => 'nullable|string|max:255',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully!');
    }
    

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_name'   => 'required|string|max:255',
            'gender'         => 'nullable|string|max:50',
            'date_of_birth'  => 'nullable|date',
            'class'          => 'required|string|max:255',
            'class_section'  => 'required|string|max:255',
            'nim'            => 'required|string||unique:students,nim,' . $student->id,
            'parent_name'    => 'required|string|max:255',
            'parent_contact' => 'required|string|max:255',
            'parent_email'   => 'required|email|max:255',
            'pickup_code'    => 'required|string|unique:students,pickup_code,' . $student->id,
            'address'        => 'nullable|string|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}
