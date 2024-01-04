<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    { 
        /*
        // User's password to be hashed
        $userPassword = "t0ny";
        // Hash the password
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        // Output the hashed password
        echo "Hashed Password: " . $hashedPassword;
        */

        $credentials = $request->only('username', 'password');
        //dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            // Authentication passed
            //echo "hayk";
            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}