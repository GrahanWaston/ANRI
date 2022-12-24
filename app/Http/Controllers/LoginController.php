<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.login', [
            'judul' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'status' => '1'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (!Auth::user()->status == 1) {
                Auth::logout();
                return back()->with('error', 'Login Error');
            }
            // return redirect()->intended('/dasboard');
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Login Error');
    }

    public function logout()
    {
        Auth::logout();
        Request()->session()->invalidate();
        Request()->session()->regenerate();

        return redirect('/login');
    }
}
