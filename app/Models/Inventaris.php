<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'kode_barang',
        'nama_barang',
        'deskripsi_barang',
        'kelompok_barang',
        'departemen_pemilik',
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
        'status',
    ];

    public function peminjamanAktif()
    {
        return $this->hasOne(Peminjaman::class, 'kode_barang', 'kode_barang')
            ->where('status', 'Dipinjam');
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'kode_barang', 'kode_barang');
    }
}
