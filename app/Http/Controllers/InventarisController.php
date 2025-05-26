<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Storage;

class InventarisController extends Controller
{
    // Tampilkan semua data inventaris
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('Admin.inventaris', compact('inventaris'));
    }

    // Tampilkan form tambah inventaris
    public function create()
{
    return view('Admin.inventarisadd');
}

// Simpan data inventaris baru
public function store(Request $request)
{
    $validated = $request->validate([
        'kode_barang'             => 'required|string|max:100|unique:inventaris,kode_barang',
        'nama_barang'             => 'required|string|max:255',
        'deskripsi_barang'        => 'required|string',
        'kelompok_barang'         => 'required|string',
        'departemen_pemilik'      => 'nullable|string',
        'merk'                    => 'nullable|string',
        'tipe_part_number'        => 'nullable|string',
        'serial_number'           => 'nullable|string',
        'tanggal_pembelian'       => 'nullable|date',
        'harga'                   => 'nullable|numeric',
        'penanggungjawab'         => 'nullable|string',
        'kondisi_barang'          => 'nullable|string',
        'lokasi_barang'           => 'nullable|string',
        'tanggal_expired_garansi' => 'nullable|date',
        'keterangan'              => 'nullable|string',
        'photo_barang'            => 'nullable|image|mimes:jpeg,png,jpg',
        'photo_serial'            => 'nullable|image|mimes:jpeg,png,jpg',
        'photo_nota'              => 'nullable|image|mimes:jpeg,png,jpg',
        'photo_lainnya'           => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    // Upload file jika ada
    foreach (['photo_barang', 'photo_serial', 'photo_nota', 'photo_lainnya'] as $photoField) {
        if ($request->hasFile($photoField)) {
            $path = $request->file($photoField)->store('public/foto_inventaris');
            $validated[$photoField] = str_replace('public/', 'storage/', $path);
        }
    }

    Inventaris::create($validated);

    return redirect()->route('inventaris')->with('success', 'Data Inventaris berhasil disimpan.');
}

    // Tampilkan form edit
    public function edit($id)
    {
        $inventaris = Inventaris::where('id', $id)->firstOrFail();
        return view('Admin.inventarisedit', compact('inventaris'));
    }

    // Update data inventaris
    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::where('id', $id)->firstOrFail();

        $validated = $request->validate([
           'kode_barang' => 'required|string|max:100|unique:inventaris,kode_barang,' . $inventaris->id,
            'nama_barang'             => 'required|string|max:255',
            'deskripsi_barang'        => 'required|string',
            'kelompok_barang'         => 'required|string',
            'departemen_pemilik'      => 'nullable|string',
            'merk'                    => 'nullable|string',
            'tipe_part_number'        => 'nullable|string',
            'serial_number'           => 'nullable|string',
            'tanggal_pembelian'       => 'nullable|date',
            'harga'                   => 'nullable|numeric',
            'tempat_pembelian'        => 'nullable|string',
            'penanggungjawab'         => 'nullable|string',
            'kondisi_barang'          => 'nullable|string',
            'lokasi_barang'           => 'nullable|string',
            'tanggal_expired_garansi' => 'nullable|date',
            'keterangan'              => 'nullable|string',
            'photo_barang'            => 'nullable|image|mimes:jpeg,png,jpg',
            'photo_serial'            => 'nullable|image|mimes:jpeg,png,jpg',
            'photo_nota'              => 'nullable|image|mimes:jpeg,png,jpg',
            'photo_lainnya'           => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        foreach (['photo_barang', 'photo_serial', 'photo_nota', 'photo_lainnya'] as $photoField) {
            if ($request->hasFile($photoField)) {
                // Hapus file lama jika ada
                if ($inventaris->$photoField) {
                    $oldPath = str_replace('storage/', 'public/', $inventaris->$photoField);
                    Storage::delete($oldPath);
                }

                $path = $request->file($photoField)->store('public/foto_inventaris');
                $validated[$photoField] = str_replace('public/', 'storage/', $path);
            }
        }

        $inventaris->update($validated);

        return redirect()->route('inventaris')->with('success', 'Data Inventaris berhasil diperbarui.');
    }

    // Hapus data inventaris
    public function destroy($id)
    {
        $inventaris = Inventaris::where('id', $id)->firstOrFail();

        // Hapus file terkait jika ada
        foreach (['photo_barang', 'photo_serial', 'photo_nota', 'photo_lainnya'] as $photoField) {
            if ($inventaris->$photoField) {
                $path = str_replace('storage/', 'public/', $inventaris->$photoField);
                Storage::delete($path);
            }
        }

        $inventaris->delete();

        return redirect()->route('inventaris')->with('success', 'Data Inventaris berhasil dihapus.');
    }
}
