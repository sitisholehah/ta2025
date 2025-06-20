<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Inventaris;
use App\Models\HistoryPeminjaman;

class HistoryPeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['barang', 'peminjam'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $jumlahPeminjaman = Peminjaman::count();
        $jumlahKaryawan = Karyawan::count();
        $jumlahUser = User::count();

        // Ambil 5 riwayat peminjaman terbaru
        $history = HistoryPeminjaman::selectRaw('MIN(id) as id')
            ->groupBy('id_peminjaman', 'status_lama', 'status_baru', 'kode_barang')
            ->orderByDesc('id')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return HistoryPeminjaman::find($item->id);
            });

        return view('admin.history', compact(
            'peminjamans',
            'jumlahPeminjaman',
            'jumlahKaryawan',
            'jumlahUser',
            'history' // kirim ke view
        ));
    }
}

