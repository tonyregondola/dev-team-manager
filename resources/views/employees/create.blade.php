@extends('header')

@section('content')
<div class="col-md-8">
<h4>::Employees::</h4>
<div class="mb-3 card login-card">
    <div class="card-header">
    Create Employee
    </div>
    <div class="card-body">

<form action="{{ route('employees.store') }}" method="post">
    @csrf
    <label for="first_name">First Name:</label><br/>
    <input type="text" name="first_name" required><br/>
    
    <label for="last_name">Last Name:</label><br/>
    <input type="text" name="last_name" required><br/>
    
    <label for="position">Position:</label><br/>
    <select name="position" required>
        <option value="">Select Position</option>
        <option value="Web Developer">Web Developer</option>
        <option value="Web Designer">Web Designer</option>
        <option value="Manager">Manager</option>
    </select><br/><br/>

    <button type="submit">Save</button>
</form>
</div></div></div>
@endsection

@extends('footer')
