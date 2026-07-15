@extends('students.layout')

@section('content')
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}">
            @error('first_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}">
            @error('last_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course" value="{{ old('course', $student->course) }}">
            @error('course') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Year Level</label>
            <select name="year_level">
                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}" {{ old('year_level', $student->year_level) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('year_level') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-add">Update Student</button>
        <a href="{{ route('students.index') }}">Cancel</a>
    </form>
@endsection