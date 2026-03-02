<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('movies.login');
    }

    public function login(Request $request) {
        // 1. Validasi format email agar harus diisi dan valid
        $request->validate([
            'email' => 'required|email',
        ]);

        // 2. Cek apakah email sudah ada di database
        $user = \App\Models\User::where('email', $request->email)->first();

        // 3. Jika email BELUM ada, tambahkan ke database (Auto-Register)
        if (!$user) {
            $user = \App\Models\User::create([
                'name' => explode('@', $request->email)[0], // Ambil nama dari depan email
                'email' => $request->email,
                'password' => bcrypt('password123'), // Password default karena tidak diminta
            ]);
        }

        // 4. Login-kan user (baik yang lama maupun yang baru dibuat)
        Auth::login($user);
        
        $request->session()->regenerate();
        return redirect()->intended('/movies');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/movies');
    }
}