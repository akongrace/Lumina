<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">← Back</a>

    {{-- Student Photo --}}
    @if ($student->photo)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $student->photo) }}"
                 alt="Student Photo"
                 class="rounded-circle"
                 style="width:150px;height:150px;object-fit:cover;">
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="fw-bold mb-3">{{ $student->student_name }}</h3>

            <table class="table table-bordered">
                <tr>
                    <th>NIM</th>
                    <td>{{ $student->nim }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $student->gender }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $student->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>{{ $student->class }}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{ $student->class_section }}</td>
                </tr>
                <tr>
                    <th>Parent Name</th>
                    <td>{{ $student->parent_name }}</td>
                </tr>
                <tr>
                    <th>Parent Contact</th>
                    <td>{{ $student->parent_contact }}</td>
                </tr>
                <tr>
                    <th>Parent Email</th>
                    <td>{{ $student->parent_email }}</td>
                </tr>

                <tr>
                    <th>Pickup Code</th>
                    <td>
                        @if(auth()->user()->role === 'admin')
                            <span class="badge bg-success">{{ $student->pickup_code }}</span>
                        @else
                            <span class="badge bg-secondary">Hidden</span>
                        @endif
                    </td>
                </tr>
            </table>

        </div>
    </div>

</div>

</body>
</html>
