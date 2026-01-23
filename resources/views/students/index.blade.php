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

    {{-- Alerts --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h2 class="text-center mb-4 fw-bold">Students List</h2>

    {{-- Admin only Add Student --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">+ Add Student</a>
    @endif

    {{-- Search --}}
    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control"
                   placeholder="Search by Name or NIM...">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Class</th>
                            <th>Class Section</th>
                            <th>NIM</th>
                            <th>Parent Name</th>
                            <th>Parent Contact</th>
                            <th>Parent Email</th>
                            <th>Pickup Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($students as $student)
                            <tr class="{{ $student->trashed() ? 'table-warning' : '' }}">
                                <td>{{ $student->id }}</td>

                                <td>
                                    @if($student->photo)
                                        <img src="{{ asset('storage/'.$student->photo) }}"
                                             width="50" height="50"
                                             class="rounded-circle border">
                                    @else
                                        —
                                    @endif
                                </td>

                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->class_section }}</td>
                                <td>{{ $student->nim }}</td>
                                <td>{{ $student->parent_name }}</td>
                                <td>{{ $student->parent_contact }}</td>
                                <td>{{ $student->parent_email }}</td>

                                <td>
                                    @if(auth()->user()->role === 'admin')
                                        {{ $student->pickup_code }}
                                    @else
                                        Hidden
                                    @endif
                                </td>

                                <td>
                                    {{-- View always --}}
                                    <a href="{{ route('students.show', $student->id) }}"
                                       class="btn btn-info btn-sm mb-1">
                                        View
                                    </a>

                                    {{-- Admin only --}}
                                    @if(auth()->user()->role === 'admin')

                                        {{-- Edit only when NOT deleted --}}
                                        @if(!$student->trashed())
                                            <a href="{{ route('students.edit', $student->id) }}"
                                               class="btn btn-primary btn-sm mb-1">
                                                Edit
                                            </a>
                                        @endif

                                        {{-- Restore only when deleted --}}
                                        @if($student->trashed())
                                            <form action="{{ route('students.restore', $student->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning btn-sm mb-1">
                                                    Restore
                                                </button>
                                            </form>
                                        @else
                                            {{-- Delete only when NOT deleted --}}
                                            <form action="{{ route('students.destroy', $student->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mb-1"
                                                        onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center text-muted">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.classList.remove('show');
        });
    }, 3000);
</script>

</body>
</html>