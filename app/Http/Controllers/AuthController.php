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
        $request->validate([
            'email' => 'required|email',
        ]);

        // Gunakan updateOrCreate atau firstOrCreate agar jika sudah ada tidak error
        $user = \App\Models\User::firstOrCreate(
            ['email' => $request->email], // Cari berdasarkan email ini
            [
                'name' => explode('@', $request->email)[0], // Jika tidak ada, buat dengan nama ini
                'password' => bcrypt('password123'), 
            ]
        );

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