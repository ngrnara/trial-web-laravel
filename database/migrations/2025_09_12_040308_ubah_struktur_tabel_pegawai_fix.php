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
         // Ubah nama kolom 'nama_lengkap' menjadi 'nama' menggunakan SQL raw
        DB::statement('ALTER TABLE pegawais CHANGE nama_lengkap nama VARCHAR(255);');

        Schema::table('pegawais', function (Blueprint $table) {
            // Hapus kolom 'jabatan' dan 'nomor_telepon'
            $table->dropColumn(['jabatan', 'nomor_telepon']);

            // Tambahkan kolom 'foto' setelah 'email'
            $table->string('foto')->nullable()->after('email');
        });

        // Ubah nama tabel dari 'pegawais' menjadi 'pegawai'
        Schema::rename('pegawais', 'pegawai');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::rename('pegawai', 'pegawais');

        Schema::table('pegawais', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_lengkap');
            $table->string('jabatan')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->dropColumn('foto');
        });
    }
};
