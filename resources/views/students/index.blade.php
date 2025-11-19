<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Student Records</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    @if(session('success'))
    <div style="padding: 12px;
     background-color:aliceblue: #d4edda; border: 1px solid #c3e6cb; color: #155724; margin-bottom: 15px; border-radius: 5px;">
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Parent Name</th>
                <th>Parent phone</th>
                <th>Parent Email</th>
                <th>Pickup Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->section }}</td>
                    <td>{{ $student->parent_name }}</td>
                    <td>{{ $student->parent_contact }}</td>
                    <td>{{ $student->parent_email }}</td>
                    <td>{{ $student->pickup_code }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        <form action="{{ route('students.store',)}}" method="POST>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this student?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>