<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class UserPeminjamanController extends Controller
{
    public function index()
    {
        // Ambil data peminjaman milik user yang sedang login
        $peminjamans = Peminjaman::where('id_peminjam', Auth::id())->get();

        return view('anggota.peminjaman', compact('peminjamans'));
    }

    public function create()
    {
        return view('anggota.peminjaman_create'); // Sesuaikan dengan file view yang kamu miliki
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'       => 'required|string|max:255',
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
            'nama_barang'       => $request->nama_barang,
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

        return view('anggota.peminjaman_edit', compact('peminjaman')); // Sesuaikan view jika beda
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'       => 'required|string|max:255',
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
            'nama_barang'       => $request->nama_barang,
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
