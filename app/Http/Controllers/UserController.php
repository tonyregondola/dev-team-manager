<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function loginForm()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // Add your logic to authenticate the user
        // $request->input('username') and $request->input('password') can be used to get form inputs
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
