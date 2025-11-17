<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // PANGGIL 3 SEEDER YANG KITA BUAT DI SINI
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
