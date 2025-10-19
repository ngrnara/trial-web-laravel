<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // buat salt random
        $salt = bin2hex(random_bytes(8));
        $plain = 'password123';

        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make($plain), // hash standar Laravel (bcrypt)
            'password_asli' => $plain, // simpan teks asli (kalau sistem kamu butuh)
            'password_enkripsi' => Crypt::encryptString($plain), // enkripsi bawaan Laravel
            'hash_dari_enkripsi' => hash('sha256', $plain),
            'salt_value' => $salt,
            'final_hash' => hash('sha512', $plain . $salt),
            'user_image' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
