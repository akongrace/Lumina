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
    <a href="{{ route('students.edit', $student->id) }}" >

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

  <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="section" value="{{ $student->section }}">
    <input type="text" name="parent_name" value="{{ $student->parent_name }}">
    <input type="text" name="parent_contact" value="{{ $student->parent_contact }}">
    <input type="text" name="parent_email" value="{{ $student->parent_email }}">
    <input type="text" name="pickup_code" value="{{ $student->pickup_code }}">

    <button type="submit">Update</button>
</form>