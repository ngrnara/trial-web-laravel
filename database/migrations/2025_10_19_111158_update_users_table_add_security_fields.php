<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // tambahkan kolom baru sesuai tabel "keamanan data"
            $table->text('password_asli')->nullable()->after('password');
            $table->text('password_enkripsi')->nullable()->after('password_asli');
            $table->text('hash_dari_enkripsi')->nullable()->after('password_enkripsi');
            $table->string('salt_value')->nullable()->after('hash_dari_enkripsi');
            $table->text('final_hash')->nullable()->after('salt_value');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // rollback kolom tambahan
            $table->dropColumn([
                'password_asli',
                'password_enkripsi',
                'hash_dari_enkripsi',
                'salt_value',
                'final_hash',
            ]);
        });
    }
};
