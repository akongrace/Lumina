<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Add New Student</h2>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf

        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter student name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" name="class" class="form-control" placeholder="Enter class" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Section</label>
            <input type="text" name="section" class="form-control" placeholder="Enter section" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Name</label>
            <input type="text" name="parent_name" class="form-control" placeholder="Enter parent name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Contact</label>
            <input type="text" name="parent_contact" class="form-control" placeholder="Enter phone number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Parent Email</label>
            <input type="email" name="parent_email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pickup Code</label>
            <input type="text" name="pickup_code" class="form-control" placeholder="Enter unique pickup code" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Save Student</button>

        <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address" class="form-control" > 
</div>

<div class="mb-3">
    <label class="form-label">city</label>
    <input type="text" name="city" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">State</label>
    <input type="text" name="state" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Zip Code</label>
    <input type="text" name="zip_code" class="form-control">
</div>

<div class="mb-3">
    <label class=form-label>Country</label>
    <input type="text" name="country" class="form-control">
</div>
    </form>
</div>

</body>
</html>