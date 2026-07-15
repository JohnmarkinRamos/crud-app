@extends('students.layout')

@section('content')
    <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>
    <p><strong>Year Level:</strong> {{ $student->year_level }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-view">Back to List</a>
    <a href="{{ route('students.edit', $student) }}" class="btn btn-edit">Edit</a>
@endsection