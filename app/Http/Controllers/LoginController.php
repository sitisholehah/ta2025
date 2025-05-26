<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('admin.login'); // Ganti dengan path blade yang sesuai
    }

    /**
     * Proses login user.
     */
    public function progress(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'max:50'],
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $roleId = Auth::user()->role_id;

            if ($roleId === 1) {
                return redirect('/');
            } elseif ($roleId === 2) {
                return redirect()->route('anggota.dashboard');
            } else {
                Auth::logout();
                abort(403, 'Role tidak dikenali.');
            }
        }

        Session::flash('status', 'Username atau Password salah');
        return redirect('/login');
    }

    /**
     * Logout user dan hapus sesi.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
