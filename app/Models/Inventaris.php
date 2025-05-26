<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris'; // pastikan sesuai nama tabel
    protected $primaryKey = 'id';
    public $incrementing = false; // kalau id_karyawan bukan auto-increment
    protected $keyType = 'string'; // sesuaikan, misal jika ID-nya pakai teks

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi_barang',
        'kelompok_barang',
        'merk',
        'tipe_part_number',
        'serial_number',
        'tanggal_pembelian',
        'harga',
        'tempat_pembelian',
        'penanggungjawab',
        'kondisi_barang',
        'lokasi_barang',
        'tanggal_expired_garansi',
        'keterangan',
        'photo_barang',
        'photo_serial',
        'photo_nota',
        'photo_lainnya',
    ];
}
