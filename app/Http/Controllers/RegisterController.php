<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'pass' => ['required']
        ]);

        $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->pass)
        ];

        $user = User::create($credentials);

        Auth::login($user);


        return to_route('welcome');
    }
}
