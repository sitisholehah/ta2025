<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    // Tampilkan semua data karyawan
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('Admin.karyawan', compact('karyawan'));
    }

    // Tampilkan form tambah karyawan
    public function create()
    {
        return view('Admin.karyawanadd');
    }

    // Simpan data karyawan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_karyawan'     => 'required|string|max:50',
            'nama_karyawan'   => 'required|string|max:255',
            'jabatan'         => 'required|string|max:255',
            'no_hp'           => 'nullable|string',
            'alamat'          => 'nullable|string',
        ]);

        Karyawan::create($validated);

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil disimpan.');
    }

    // Tampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        return view('Admin.karyawanedit', compact('karyawan'));
    }

    // Simpan perubahan data karyawan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'no_hp'         => 'nullable|string',
            'alamat'        => 'nullable|string',
        ]);

        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        $karyawan->update($validated);

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // Hapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        $karyawan->delete();

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
