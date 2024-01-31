<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Create Form

    public function create() {
        return view('users.register');

    }

    // Create New User

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password

        $formFields['password'] = bcrypt($formFields['password']);


        // Create User

        $user = User::create($formFields);

        // Login User

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');


    }

    // Logout method

    public function logout(Request $request) {
        auth()->logout();   // Terminate the User's authentication session

        $request->session()->invalidate(); // Clears all session data for security

        $request->session()->regenerateToken(); // Creates a new session token to prevent seession hijacking

        return redirect('/')->with('message', 'You have been logged out');    
    }

    // Login method

    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
