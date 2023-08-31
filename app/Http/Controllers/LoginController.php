<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function __invoke()
    {
        return view('auth.login');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($attributes)){
            return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
        }

        return redirect('/')->with('success', 'Welcome Back!');
    }
}

