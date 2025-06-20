<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPeminjaman extends Model
{
    // Paksa Laravel pakai nama tabel yang BENAR
    protected $table = 'history_peminjaman';

    public $timestamps = false; // kalau tidak ada created_at / updated_at
}



