<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function auth(Request $request)
    {
        $cridentials = $request->only(['email','password']);

        if (Auth::attempt($cridentials)) {
            return redirect('/dashboard');
        }

        return redirect()->back()->with('error', 'Login failed');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function registerpost(Request $request)
    {
        $dataValidate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);


        User::create([
            'name' => $dataValidate['name'],
            'email' => $dataValidate['email'],
            'password' => bcrypt($dataValidate['password']),
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
