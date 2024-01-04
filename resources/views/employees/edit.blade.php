<!-- resources/views/employees/edit.blade.php -->
@extends('header')

@section('content')

<div class="col-md-8">
<h4>::Employees::</h4>
<div class="mb-3 card login-card">
    <div class="card-header">
    Edit Employee
    </div>
    <div class="card-body">

<form action="{{ route('employees.update', $employee->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="first_name">First Name:</label><br />
    <input type="text" name="first_name" value="{{ $employee->first_name }}" required><br />

    <label for="first_name">Last Name:</label><br />
    <input type="text" name="last_name" value="{{ $employee->last_name }}" required><br />

    <label for="position">Position:</label><br/>
    <select name="position" required>
        <option value="">Select Position</option>
        <option value="Web Developer" {{ $employee->position === 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
        <option value="Web Designer" {{ $employee->position === 'Web Designer' ? 'selected' : '' }}>Web Designer</option>
        <option value="Manager" {{ $employee->position === 'Manager' ? 'selected' : '' }}>Manager</option>
    </select><br/><br/>

    <button type="submit">Update Employee</button>
</form>
@endsection

@extends('footer')

