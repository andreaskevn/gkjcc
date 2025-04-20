<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['success' => true, 'message' => 'Login berhasil']);
        }

        return response()->json(['success' => false, 'message' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hancurkan session
        $request->session()->regenerateToken(); // Regenerasi token CSRF
    
        // Hapus semua cookies sesi Laravel
        $cookie = Cookie::forget('laravel_session');
    
        return response()->json(['message' => 'Logout berhasil'])->withCookie($cookie);
    }
}
