<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->roles == 'admin') {
                // return redirect('/');
                return view('dashboard');
            }

            // return back()->withErrors([
            //     'password' => 'Username atau Password anda salah',
            // ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
