<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; 

    protected $fillable = [
        'id_peminjam',
        'nama_peminjam',
        'nama_barang',
        'jumlah',
        'divisi',
        'penanggungjawab',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keterangan',
    ];
}
