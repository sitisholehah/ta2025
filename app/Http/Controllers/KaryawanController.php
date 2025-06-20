<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Karyawan::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id_karyawan', 'like', "%{$search}%")
                  ->orWhere('nama_karyawan', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhere('divisi', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $karyawan = $query->paginate(10)->appends(['search' => $search]);

        return view('Admin.karyawan', compact('karyawan'));
    }

    public function create()
    {
        return view('Admin.karyawanadd');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_karyawan'     => 'required|string|max:50|unique:karyawans,id_karyawan',
            'nama_karyawan'   => 'required|string|max:255',
            'jabatan'         => 'required|string|max:255',
            'divisi'          => 'required|string|max:255',
            'no_hp'           => 'nullable|string|max:20',
            'alamat'          => 'nullable|string',
        ]);

        Karyawan::create($validated);

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil disimpan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        return view('Admin.karyawanedit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'jabatan'       => 'required|string|max:255',
            'divisi'        => 'required|string|max:255',
            'no_hp'         => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
        ]);

        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        $karyawan->update($validated);

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        $karyawan->delete();

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
