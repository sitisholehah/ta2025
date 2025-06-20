<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\Karyawan;

class PeminjamanController extends Controller
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

        return view('admin.peminjaman', compact('peminjamans'));
    }

    public function create()
    {
        $inventaris = Inventaris::all();
        $karyawans = Karyawan::all();

        return view('admin.peminjamanadd', compact('inventaris', 'karyawans'));
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

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $inventaris = Inventaris::all();
        $karyawans = Karyawan::all();

        return view('admin.peminjamanedit', compact('peminjaman', 'inventaris', 'karyawans'));
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

    // Cek apakah ada perubahan data sama sekali
    $dataToUpdate = [
        'id_peminjam' => $karyawan->id_karyawan,
        'nama_peminjam' => $karyawan->nama_karyawan,
        'kode_barang' => $request->kode_barang,
        'jumlah' => $request->jumlah,
        'divisi' => $request->divisi,
        'penanggungjawab' => $request->penanggungjawab,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'keterangan' => $request->keterangan,
    ];

    // Hanya update status jika berbeda
    if ($peminjaman->status !== $request->status) {
        $dataToUpdate['status'] = $request->status;
    }

    // Cek apakah ada perubahan sama sekali
    $hasChanged = false;
    foreach ($dataToUpdate as $key => $value) {
        if ($peminjaman->$key != $value) {
            $hasChanged = true;
            break;
        }
    }

    if ($hasChanged) {
        $peminjaman->update($dataToUpdate);
    }

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
}

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Contoh: update status inventaris jika barang masih dipinjam
        if ($peminjaman->status === 'Dipinjam') {
            $inventaris = Inventaris::where('kode_barang', $peminjaman->kode_barang)->first();
            if ($inventaris) {
                $inventaris->status = 'Tersedia';
                $inventaris->save();
            }
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
