@extends('header')

@section('content')

<div class="col-md-8">
<h4>::Employees::</h4>
<div class="mb-3 card login-card">
    <div class="card-header">
    List of Employees
    </div>
    <div class="card-body">

{{-- Add Button --}}
<a href="{{ route('employees.create') }}">Add Employee</a>

{{-- Table Header --}}
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {{-- Loop through employees --}}
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->created_at->format('M. d, Y') }}</td>
                <td>
                    {{-- Edit Link --}}
                    <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                    
                    {{-- Delete Link (You can replace '#delete' with the actual delete route) --}}
                    <a href="{{ route('employees.destroy', $employee->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $employee->id }}').submit();">Delete</a>
                    
                    {{-- Delete Form (for each employee) --}}
                    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div></div></div>
@endsection

@extends('footer')