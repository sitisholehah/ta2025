<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan halaman pengaturan profil
     */
    public function settings()
    {
        /** @var User $user */
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('admin.settings', compact('user'));
    }

    /**
     * Proses update password
     */
    public function updatePassword(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal 6 karakter.',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password lama tidak cocok.'],
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.settings')->with('status', 'Password berhasil diubah!');
    }

    /**
     * Proses upload/update foto profil
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path('assets/foto/' . $user->photo))) {
                unlink(public_path('assets/foto/' . $user->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/foto'), $filename);

            $user->photo = $filename;
            $user->save();

            return back()->with('status', 'Foto profil berhasil diupdate!');
        }

        return back()->withErrors(['photo' => 'Foto profil gagal diupload.']);
    }

    /**
     * Proses update username
     */
    public function updateName(Request $request)
{
    /** @var User $user */
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $request->validate([
        'name' => 'required|string|max:255|unique:users,name,' . $user->id,
    ]);

    $user->name = $request->name;
    $user->save();

    return redirect()->route('profile.settings')->with('status', 'Nama berhasil diperbarui!');
}

}
