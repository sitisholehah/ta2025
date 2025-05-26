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
    Schema::create('penanggungjawab', function (Blueprint $table) {
        $table->string('id')->primary(); // <-- BUKAN auto-increment
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('telepon');
        $table->timestamps();
    });
}

    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penanggungjawab');
    }
};
