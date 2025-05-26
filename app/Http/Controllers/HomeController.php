<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Peminjaman;
use App\Models\Inventaris;


class HomeController extends Controller

{
   public function index()
    {
        return view('user.homepage');
    }

    public function karyawan()
    {
        $karyawans = Karyawan::all();
        return view('user.karyawan', compact('karyawans'));
    }

    public function peminjaman()
    {
        $peminjamans = Peminjaman::all();
        return view('user.peminjaman', compact('peminjamans'));
    }

    public function inventaris()
    {
        $inventaris = Inventaris::all();
        return view('user.inventaris', compact('inventaris'));
    }
}
