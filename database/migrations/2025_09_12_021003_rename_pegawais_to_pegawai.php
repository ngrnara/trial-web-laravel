<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Rename tabel pegawais -> pegawai
        Schema::rename('pegawais', 'pegawai');
    }

    public function down(): void
    {
        // Kembalikan nama tabel bila rollback
        Schema::rename('pegawai', 'pegawais');
    }
};
