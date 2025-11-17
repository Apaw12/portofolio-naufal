<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting untuk mengenkripsi password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user lama jika ada (opsional, tapi bagus untuk testing)
        User::truncate();

        // Buat User Admin baru
        User::create([
            'name' => 'Naufal Atilah', // Ganti dengan nama Anda
            'email' => 'naufalatilah2005@gmail.com', // GANTI DENGAN EMAIL LOGIN ANDA
            'password' => Hash::make('1234321'), // GANTI DENGAN PASSWORD ANDA
        ]);
    }
}