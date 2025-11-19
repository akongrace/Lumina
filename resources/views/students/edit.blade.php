<h2>Edit Student</h2>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ $student->name }}" required>

    <label>Class</label>
    <input type="text" name="class" value="{{ $student->class }}" required>

    <label>Parent Name</label>
    <input type="text" name="parent_name" value="{{ $student->parent_name }}" required>

    <label>Parent Phone</label>
    <input type="text" name="parent_phone" value="{{ $student->parent_contact }}" required>

    <button type="submit">Update</button>
</form>