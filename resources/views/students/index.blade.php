<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4 fw-bold">Students List</h2>

    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">
        Add Student
    </a>

    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Search by Name or NIM...">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>nim</th>
                        <th>Parent Name</th>
                        <th>Parent Contact</th>
                        <th>Pickup Code</th>
                        <th style="width: 170px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->parent_name }}</td>
                            <td>{{ $student->parent_contact }}</td>
                            <td>{{ $student->pickup_code }}</td>

                            <td>
                                <a href="{{ route('students.edit', $student->id) }}"
                                   class="btn btn-primary btn-sm me-1">
                                   Edit
                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                            Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No students found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
<div class="mb-3">
    {{ $students->links() }}
</div>

</body>
</html>