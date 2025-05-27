<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        // ✅ Ambil semua data peminjaman dan kirim ke view
        $peminjamans = Peminjaman::all();
        return view('Admin.peminjaman', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_peminjam' => 'required|integer', 
            'nama_peminjam' => 'required|string',
            'nama_barang' => 'required|string',
            'jumlah' => 'required|integer',
            'divisi' => 'required|string',
            'penanggungjawab'   => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Peminjaman::create([
            'id_peminjam' => $validated['id_peminjam'], 
            'nama_peminjam' => $validated['nama_peminjam'],
            'nama_barang' => $validated['nama_barang'],
            'jumlah' => $validated['jumlah'],
            'divisi' => $validated['divisi'],
            'penanggungjawab'   => $validated['penanggungjawab'],
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'keterangan' => $validated['keterangan'],
            'status' => 'Dipinjam',
            'kondisi_barang' => 'Baik',
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil disimpan.');
    }

    // ✅ Method untuk update status menjadi "Dikembalikan"
    public function updateStatus($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui menjadi Dikembalikan.');
    }
}
