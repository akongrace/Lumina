<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4 fw-bold">Edit Student</h2>

    {{-- ⬇️ FORM LAMA KAMU (HANYA DITAMBAH CLASS CARD) --}}
    <form action="{{ route('students.update', $student->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="card p-4 shadow-sm bg-white">

        @csrf
        @method('PUT')

        {{-- Photo --}}
        <div class="mb-3">
            <label class="form-label">Student Photo</label>
            <input type="file" name="photo" class="form-control">

            @if($student->photo)
                <img src="{{ asset('storage/'.$student->photo) }}"
                     class="mt-2 rounded"
                     width="80">
            @endif
        </div>

        {{-- Student Name --}}
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control"
                   value="{{ $student->student_name }}">
        </div>

        {{-- Gender --}}
        <label>Gender</label>
        <select name="gender" class="form-select mb-3">
            <option value="">Select gender</option>
            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
        </select>

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control mb-3"
               value="{{ $student->date_of_birth }}">

        {{-- Class --}}
        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" name="class" class="form-control"
                   value="{{ $student->class }}">
        </div>

        {{-- Section --}}
        <div class="mb-3">
            <label class="form-label">Class Section</label>
            <input type="text" name="class_section" class="form-control"
                   value="{{ $student->class_section }}">
        </div>

        {{-- NIM --}}
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control"
                   value="{{ $student->nim }}">
        </div>

        {{-- Parent --}}
        <div class="mb-3">
            <label class="form-label">Parent Name</label>
            <input type="text" name="parent_name" class="form-control"
                   value="{{ $student->parent_name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Contact</label>
            <input type="text" name="parent_contact" class="form-control"
                   value="{{ $student->parent_contact }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Email</label>
            <input type="email" name="parent_email" class="form-control"
                   value="{{ $student->parent_email }}">
        </div>

        {{-- Admin only --}}
        @if(auth()->user()->role === 'admin')
            <div class="mb-3">
                <label class="form-label">Pickup Code</label>
                <input type="text" name="pickup_code" class="form-control"
                       value="{{ $student->pickup_code }}">
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control"
                   value="{{ $student->address }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                ← Back
            </a>

            <button type="submit" class="btn btn-primary">
                Update Student
            </button>
        </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
