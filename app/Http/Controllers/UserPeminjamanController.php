<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Auth;

class UserPeminjamanController extends Controller
{
    public function index()
    {
        // Ambil data peminjaman milik user yang sedang login + relasi inventaris
        $peminjamans = Peminjaman::with('inventaris')
            ->where('id_peminjam', Auth::id())
            ->get();

        return view('anggota.peminjaman', compact('peminjamans'));
    }

    public function create()
    {
        // Ambil semua data barang dari inventaris untuk dropdown
        $inventaris = Inventaris::all();

        return view('anggota.peminjamanadd', compact('inventaris'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_barang'       => 'required|exists:inventaris,kode_barang',
        'jumlah'            => 'required|integer|min:1',
        'divisi'            => 'required|string|max:255',
        'penanggungjawab'   => 'required|string|max:255',
        'tanggal_pinjam'    => 'required|date',
        'tanggal_kembali'   => 'required|date|after_or_equal:tanggal_pinjam',
        'keterangan'        => 'nullable|string',
    ]);

    Peminjaman::create([
        'id_peminjam'       => Auth::id(),
        'nama_peminjam'     => Auth::user()->name, 
        'kode_barang'       => $request->kode_barang,
        'jumlah'            => $request->jumlah,
        'divisi'            => $request->divisi,
        'penanggungjawab'   => $request->penanggungjawab,
        'tanggal_pinjam'    => $request->tanggal_pinjam,
        'tanggal_kembali'   => $request->tanggal_kembali,
        'keterangan'        => $request->keterangan,
    ]);

    return redirect()->route('user.peminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
}

    public function edit($id)
    {
        $peminjaman = Peminjaman::where('id', $id)
            ->where('id_peminjam', Auth::id())
            ->firstOrFail();

        $inventaris = Inventaris::all(); // Untuk dropdown pilihan barang

        return view('anggota.peminjaman_edit', compact('peminjaman', 'inventaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang'       => 'required|exists:inventaris,kode_barang',
            'jumlah'            => 'required|integer|min:1',
            'divisi'            => 'required|string|max:255',
            'penanggungjawab'   => 'required|string|max:255',
            'tanggal_pinjam'    => 'required|date',
            'tanggal_kembali'   => 'required|date|after_or_equal:tanggal_pinjam',
            'keterangan'        => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::where('id', $id)
            ->where('id_peminjam', Auth::id())
            ->firstOrFail();

        $peminjaman->update([
            'nama_peminjam'     => Auth::user()->name,
            'kode_barang'       => $request->kode_barang,
            'jumlah'            => $request->jumlah,
            'divisi'            => $request->divisi,
            'penanggungjawab'   => $request->penanggungjawab,
            'tanggal_pinjam'    => $request->tanggal_pinjam,
            'tanggal_kembali'   => $request->tanggal_kembali,
            'keterangan'        => $request->keterangan,
        ]);

        return redirect()->route('user.peminjaman')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::where('id', $id)
            ->where('id_peminjam', Auth::id())
            ->firstOrFail();

        $peminjaman->delete();

        return redirect()->route('user.peminjaman')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
