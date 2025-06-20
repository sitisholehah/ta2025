<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\Karyawan;

class UserPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with('barang', 'peminjam');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_peminjam', 'like', '%' . $search . '%')
                    ->orWhere('divisi', 'like', '%' . $search . '%')
                    ->orWhere('penanggungjawab', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('barang', function ($q2) use ($search) {
                        $q2->where('nama_barang', 'like', '%' . $search . '%');
                    });
            });
        }
        $peminjamans = $query->paginate(10);
        $peminjamans->appends($request->only('search'));
        return view('anggota.peminjaman', compact('peminjamans'));
    }

    public function create()
    {
        $inventaris = Inventaris::all();
        $karyawans = Karyawan::all();
        return view('anggota.peminjamanadd', compact('inventaris', 'karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjam' => 'required|exists:karyawans,id_karyawan',
            'kode_barang' => 'required|exists:inventaris,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'divisi' => 'required|string|max:255',
            'penanggungjawab' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:Dipinjam,Dikembalikan',
            'keterangan' => 'nullable|string',
        ]);

        $karyawan = Karyawan::where('id_karyawan', $request->id_peminjam)->firstOrFail();

        Peminjaman::create([
            'id_peminjam' => $karyawan->id_karyawan,
            'nama_peminjam' => $karyawan->nama_karyawan,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'divisi' => $request->divisi,
            'penanggungjawab' => $request->penanggungjawab,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('user.peminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $inventaris = Inventaris::all();
        $karyawans = Karyawan::all();
        return view('anggota.peminjamanedit', compact('peminjaman', 'inventaris', 'karyawans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_peminjam' => 'required|exists:karyawans,id_karyawan',
            'kode_barang' => 'required|exists:inventaris,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'divisi' => 'required|string|max:255',
            'penanggungjawab' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:Dipinjam,Dikembalikan',
            'keterangan' => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $karyawan = Karyawan::findOrFail($request->id_peminjam);

        $peminjaman->update([
            'id_peminjam' => $karyawan->id_karyawan,
            'nama_peminjam' => $karyawan->nama_karyawan,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'divisi' => $request->divisi,
            'penanggungjawab' => $request->penanggungjawab,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('user.peminjaman')->with('success', 'Data peminjaman berhasil diperbarui.');
    }
    public function destroy($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Optional: sebelum hapus, bisa cek atau update status inventaris jika perlu
    // Misal kalau ingin set status inventaris jadi 'Tersedia' jika barang sudah dikembalikan
    if ($peminjaman->status === 'Dipinjam') {
        $inventaris = Inventaris::where('kode_barang', $peminjaman->kode_barang)->first();
        if ($inventaris) {
            $inventaris->status = 'Tersedia';
            $inventaris->save();
        }
    }

    $peminjaman->delete();

    return redirect()->route('user.peminjaman')->with('success', 'Data peminjaman berhasil dihapus.');
}
}
