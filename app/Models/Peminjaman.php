<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'id_peminjam',
        'nama_peminjam',
        'kode_barang',
        'jumlah',
        'divisi',
        'penanggungjawab',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keterangan',
        'status',
    ];

    public function peminjam()
    {
        return $this->belongsTo(\App\Models\Karyawan::class, 'id_peminjam', 'id_karyawan');
    }

    public function barang()
    {
        return $this->belongsTo(Inventaris::class, 'kode_barang', 'kode_barang');
    }

    public function updateStatusInventaris()
    {
        $inventaris = Inventaris::where('kode_barang', $this->kode_barang)->first();

        if ($inventaris) {
            if ($this->status === 'Dikembalikan') {
                $inventaris->status = 'Tersedia';
            } elseif ($this->status === 'Dipinjam') {
                $inventaris->status = 'Tidak Tersedia';
            }
            $inventaris->save();
        }
    }

    public function save(array $options = [])
    {
        $saved = parent::save($options);
        $this->updateStatusInventaris();
        return $saved;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $updated = parent::update($attributes, $options);
        $this->updateStatusInventaris();
        return $updated;
    }
}
