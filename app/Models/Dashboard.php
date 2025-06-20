<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    // Jika nama tabel bukan 'dashboards', tentukan nama tabelnya
    protected $table = 'dashboard'; // ganti sesuai nama tabel sebenarnya

    // Kolom-kolom yang bisa diisi massal (sesuaikan dengan tabel dashboard kamu)
    protected $fillable = [
        'id_peminjaman',
        'status_peminjaman',
        // tambahkan field lain jika ada, contoh:
        // 'jumlah_peminjaman',
        // 'tanggal_update',
    ];

    // Kalau tabel pakai timestamp created_at dan updated_at, biarkan true
    public $timestamps = true;

    // Relasi ke Peminjaman (jika diperlukan)
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id');
    }
}
