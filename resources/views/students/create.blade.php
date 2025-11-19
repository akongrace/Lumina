
@section('content')
    <h2>Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="class">Class:</label>
            <input type="text" id="class" name="class" required>
        </div>
        <div>
            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>
        </div>
        <div>
            <label for="parent_name">Parent Name:</label>
            <input type="text" id="parent_name" name="parent_name" required>
        </div>
        <div>
            <label for="parent_phone">Parent contact:</label>
            <input type="text" id="parent_contact" name="parent_contact" required>
        </div>
        <button type="submit">Add Student</button>
    </form>

    