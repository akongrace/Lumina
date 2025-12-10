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
    <h2 class="mb-4 text-center">Edit Student</h2>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">← Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <select name="gender" class="form-select mb-3">
            <option value="">Select gender</option>
            <option value="Male" {{ $student->gender ==' Male'? 'selected' : '' }}>Male</option>  
            <option value="Female" {{ $student  ->gender ==' Female '? 'selected' : '' }}>Female</option>
            <option value="Other" {{ $student->gender ==' Other'? 'selected' : '' }}>Other</option>
        </select>
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control mb-3" value="{{ $student->date_of_birth }}">
        
        
        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" name="class" class="form-control" value="{{ $student->class }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Section</label>
            <input type="text" name="section" class="form-control" value="{{ $student->section }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $student->nim }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Name</label>
            <input type="text" name="parent_name" class="form-control" value="{{ $student->parent_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Contact</label>
            <input type="text" name="parent_contact" class="form-control" value="{{ $student->parent_contact }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Email</label>
            <input type="email" name="parent_email" class="form-control" value="{{ $student->parent_email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pickup Code</label>
            <input type="text" name="pickup_code" class="form-control" value="{{ $student->pickup_code }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}">
        </div>

        <button type="submit" class="btn btn-success w-100">Update Student</button>
   
    </form>
</div>

</body>
</html>