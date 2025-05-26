<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans'; // pastikan sesuai nama tabel
    protected $primaryKey = 'id_karyawan';
    public $incrementing = false; // kalau id_karyawan bukan auto-increment
    protected $keyType = 'string'; // sesuaikan, misal jika ID-nya pakai teks

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'jabatan',
        'no_hp',
        'alamat',
    ];
}
