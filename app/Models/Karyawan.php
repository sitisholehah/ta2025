<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans'; // nama tabel di database
    protected $primaryKey = 'id_karyawan'; // kolom primary key
    public $incrementing = false; // jika primary key bukan auto increment
    protected $keyType = 'string'; // tipe data primary key

    public $timestamps = true; // jika tabel punya created_at & updated_at

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'jabatan',
        'divisi',
        'no_hp',
        'alamat',
    ];

    // Relasi jika ada, misalnya ke tabel peminjamans
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_karyawan', 'id_karyawan');
    }
}
