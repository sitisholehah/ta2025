<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'id_peminjam',
        'nama_peminjam',
        'kode_barang', // Ganti nama_barang dengan kode_barang
        'jumlah',
        'divisi',
        'penanggungjawab',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keterangan',
    ];

    /**
     * Relasi ke tabel inventaris berdasarkan kode_barang
     */
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'kode_barang', 'kode_barang');
    }
}
