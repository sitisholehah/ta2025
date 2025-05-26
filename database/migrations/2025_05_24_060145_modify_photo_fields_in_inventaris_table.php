<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventaris', function (Blueprint $table) {
        $table->string('photo_barang', 255)->change();
        $table->string('photo_serial', 255)->nullable()->change();
        $table->string('photo_nota', 255)->nullable()->change();
        $table->string('photo_lainnya', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventaris', function (Blueprint $table) {
        $table->string('photo_barang', 100)->change(); // atau sesuai sebelumnya
        $table->string('photo_serial', 100)->nullable()->change();
        $table->string('photo_nota', 100)->nullable()->change();
        $table->string('photo_lainnya', 100)->nullable()->change();
        });
    }
};
