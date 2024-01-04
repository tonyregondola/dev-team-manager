<!-- resources/views/auth/login.blade.php -->
@extends('header')

@section('content')
<!--form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="username">User/Email:</label>
    <input type="username" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>
</form -->
<div class="col-md-8">
<h4>::Login::</h4>
<div class="mb-3 card login-card">
    <div class="card-header">
    LOGIN
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="mb-3">
        <label for="username">User/Email:</label><br/>
        <input type="username" name="username" id="username" required>
        </div>
        <div class="mb-3">
        <label for="password">Password:</label><br/>
        <input type="password" name="password" id="password" required>
        </div>
        <div class="text-center"><button type="submit" class="btn btn-primary">Login</button></div>
    </form>  
    </div>
</div>
</div>
@endsection

@extends('footer')