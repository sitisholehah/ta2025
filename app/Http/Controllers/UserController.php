<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Halaman dashboard user
   public function index()
{
    $user = Auth::user();
    $inventaris = Inventaris::where('penanggungjawab', $user->name)->get();

    return view('anggota.dashboard', compact('inventaris'));
}


    // Tampilkan profil user yang sedang login
    public function profile()
    {
        $user = Auth::user();

        // Cek kelengkapan profil
        if (is_null($user->email) || trim($user->email) === '') {
            session()->flash('alert', 'Email Anda kosong. Mohon lengkapi data profil Anda.');
        }
        if (is_null($user->address) || trim($user->address) === '') {
            session()->flash('alert', 'Alamat Anda kosong. Mohon lengkapi data profil Anda.');
        }
        if (is_null($user->phone) || trim($user->phone) === '') {
            session()->flash('alert', 'Nomor telepon Anda kosong. Mohon lengkapi data profil Anda.');
        }

        // Ambil semua data inventaris yang penanggung jawabnya adalah user yang sedang login
        $inventaris = Inventaris::where('penanggungjawab', $user->name)->get();

        return view('anggota.profile', compact('inventaris', 'user'));
    }

    // Update profil user yang login
    public function profileUpdate(Request $request)
{
    $user = Auth::user(); // Ini pasti instance dari App\Models\User

    $request->validate([
        'username' => 'required|string|max:255',
        'email'    => 'required|email',
        'address'  => 'nullable|string|max:255',
        'phone'    => 'nullable|string|max:20',
    ]);

    // Update slug jika username berubah
    if ($request->username !== $user->username) {
        $user->slug = Str::slug($request->username);
    }

    // Update semua data
    $user->username = $request->username;
    $user->email    = $request->email;
    $user->address  = $request->address;
    $user->phone    = $request->phone;

    // $user->save(); // PASTIKAN baris ini dipanggil dari Eloquent model, bukan array

    return redirect()->route('anggota.profile')->with('success', 'Profil berhasil diperbarui.');
}

    // Mencegah akses ke data user lain
    public function show($slug)
    {
        $user = Auth::user();

        if ($user->slug !== $slug) {
            abort(403, 'Anda tidak diizinkan mengakses data ini.');
        }

        return view('anggota.UserDetail', ['user' => $user]);
    }
}
