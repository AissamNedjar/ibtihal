<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // تسجيل الدخول

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $role = auth()->user()->role;
            return redirect()->route($role . '.home');
        }

        return redirect()->route('login')->with('error', 'Les informations d\'identification sont incorrectes.');
    }

    // الخروج

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
