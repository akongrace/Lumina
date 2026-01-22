<form action="{{ route('students.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="card p-4 shadow-sm bg-white">

    @csrf

    {{-- Photo --}}
    <div class="mb-3">
        <label class="form-label">Student Photo</label>
        <input type="file" name="photo" class="form-control">
        <small class="text-muted">JPG / PNG, max 2MB</small>
    </div>

    <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" name="student_name" class="form-control"
               value="{{ old('student_name') }}" required>
    </div>

    <label>Gender</label>
    <select name="gender" class="form-select mb-3">
        <option value="">Select gender</option>
        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>

    <label>Date of Birth</label>
    <input type="date" name="date_of_birth" class="form-control mb-3"
           value="{{ old('date_of_birth') }}">

    <div class="mb-3">
        <label class="form-label">Class</label>
        <input type="text" name="class" class="form-control"
               value="{{ old('class') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Class Section</label>
        <input type="text" name="class_section" class="form-control"
               value="{{ old('class_section') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control"
               value="{{ old('nim') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Parent Name</label>
        <input type="text" name="parent_name" class="form-control"
               value="{{ old('parent_name') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Parent Contact</label>
        <input type="text" name="parent_contact" class="form-control"
               value="{{ old('parent_contact') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Parent Email</label>
        <input type="email" name="parent_email" class="form-control"
               value="{{ old('parent_email') }}" required>
    </div>

    @if(auth()->user()->role === 'Admin')
        <div class="mb-3">
            <label class="form-label">Pickup Code</label>
            <input type="text" name="pickup_code" class="form-control"
                   value="{{ old('pickup_code') }}" required>
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control"
               value="{{ old('address') }}">
    </div>

    <button type="submit" class="btn btn-success w-100">
        Save Student
    </button>
</form>
