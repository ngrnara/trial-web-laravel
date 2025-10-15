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
    Schema::create('pegawais', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('jabatan');
        $table->string('email')->unique();
        $table->string('nomor_telepon')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};
