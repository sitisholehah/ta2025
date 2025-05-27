<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjam');
            $table->string('nama_peminjam');

            // Tambah kode_barang sebagai foreign key ke tabel inventaris
            $table->string('kode_barang');

            $table->integer('jumlah');
            $table->string('divisi');
            $table->string('penanggungjawab');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Relasi ke users (jika kamu pakai users)
            // $table->foreign('id_peminjam')->references('id')->on('users')->onDelete('cascade');

            // Foreign key ke tabel inventaris
            $table->foreign('kode_barang')->references('kode_barang')->on('inventaris')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
