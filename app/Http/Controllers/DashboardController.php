<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data peminjaman urut tanggal pinjam terbaru
        $historiPeminjaman = Peminjaman::orderBy('tanggal_pinjam', 'desc')->get();

        return view('Admin.dashboard', compact('historiPeminjaman'));
    }
}
