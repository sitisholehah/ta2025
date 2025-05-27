<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;

class DashboardController extends Controller
{
    public function index()
    {
          $peminjamans = Peminjaman::with('inventaris')
            ->where('id_peminjam', Auth::id())
            ->get();
$peminjamans = Peminjaman::all();
        return view('Admin.dashboard', compact('peminjamans'));
    }
}
