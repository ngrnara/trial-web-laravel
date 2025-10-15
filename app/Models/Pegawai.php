<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais'; // Pastikan nama tabel sesuai dengan migrasi terbaru
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'email',
        'nomor_telepon',
    ];

}
