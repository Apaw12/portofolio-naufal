<?php

namespace Database\Seeders;

use App\Models\Project; // Pastikan ini di-import
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data project lama (opsional, bagus untuk testing)
        Project::truncate();

        // Project 1: NuCle
        Project::create([
            'title' => 'NuCle Factory Outlet',
            'slug' => 'nucle-factory-outlet',
            'description' => 'Katalog e-commerce berbasis web untuk factory outlet, dibuat dengan CodeIgniter.',
            'repo_url' => 'https://github.com/liefhax/katalog-advance.git',
            'technologies' => json_encode(['CodeIgniter']), // Kita gunakan json_encode
            'image' => 'images/placeholders/nucle.jpg', // Path gambar placeholder
            'is_featured' => true, // Tampil di homepage
        ]);

        // Project 2: MOovers
        Project::create([
            'title' => 'MOovers (Aplikasi Tiket Bioskop)',
            'slug' => 'moovers-tiket-bioskop',
            'description' => 'Aplikasi mobile mockup untuk pembelian tiket bioskop, dibuat dengan Android Studio.',
            'repo_url' => null, // Tidak ada repo
            'technologies' => json_encode(['Android Studio']),
            'image' => 'images/placeholders/moovers.jpg',
            'is_featured' => true,
        ]);

        // Project 3: Saving Money
        Project::create([
            'title' => 'Saving Money (Money Management)',
            'slug' => 'saving-money-react-native',
            'description' => 'Aplikasi mobile untuk manajemen keuangan pribadi, dibuat dengan React Native.',
            'repo_url' => 'https://github.com/liefhax/MoneySaving.git',
            'technologies' => json_encode(['React Native']),
            'image' => 'images/placeholders/savingmoney.jpg',
            'is_featured' => true,
        ]);
    }
}