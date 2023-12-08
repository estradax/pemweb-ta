<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'pass' => ['required']
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->pass
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('welcome'));
        }

        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.'
        ]);
    }
}
