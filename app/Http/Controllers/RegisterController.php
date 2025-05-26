<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        $roles = Role::all(); // ambil semua role untuk dropdown
        return view('Admin.register', compact('roles'));
    }

    // Proses registrasi
    public function progress(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|exists:roles,id', // validasi role yang dipilih
        ]);

       try {
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
    ]);
} catch (\Exception $e) {
    dd('Error saat simpan user:', $e->getMessage());
}


        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
