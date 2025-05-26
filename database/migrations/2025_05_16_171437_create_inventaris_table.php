<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 100 )->unique();
            $table->string('nama_barang');
            $table->text('deskripsi_barang')->nullable();
            $table->string('kelompok_barang');
            $table->string('departemen_pemilik');
            $table->string('merk')->nullable();
            $table->string('tipe_part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->integer('harga')->nullable();
            $table->string('tempat_pembelian')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('lokasi_barang')->nullable();
            $table->date('tanggal_expired_garansi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('photo_barang')->nullable();
            $table->string('photo_serial')->nullable();
            $table->string('photo_nota')->nullable();
            $table->string('photo_lainnya')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
