<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //Create Form
    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required, confirmed, min:6']
        ]);

        // Hash Password
        
        $formfields['password'] = bcrypt($formFields['password']);
    }

}
