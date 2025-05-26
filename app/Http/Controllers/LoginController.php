<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('admin.login'); // Sesuaikan dengan lokasi view login Anda
    }

    /**
     * Proses login user.
     */
    public function progress(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Arahkan berdasarkan role_id
            if ($user->role_id === 1) {
                return redirect()->route('dashboard'); // Buat route ini di web.php
            } elseif ($user->role_id === 2) {
                return redirect()->route('anggota.dashboard'); // Buat route ini juga
            } else {
                Auth::logout();
                abort(403, 'Role tidak dikenali.');
            }
        }

        // Gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Logout user dan hapus session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
