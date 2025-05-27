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
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->string('divisi');
            $table->string('penanggungjawab');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Optional: Tambahkan foreign key ke tabel users jika ada relasi
            // $table->foreign('id_peminjam')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
