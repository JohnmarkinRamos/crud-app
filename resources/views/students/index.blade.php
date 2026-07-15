@extends('students.layout')

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-add">+ Add Student</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Actions</th>
        </tr>
        @forelse($students as $student)
        <tr>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->year_level }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}" class="btn btn-view">View</a>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No students found.</td></tr>
        @endforelse
    </table>

    <div style="margin-top: 20px;">
        {{ $students->links() }}
    </div>
@endsection