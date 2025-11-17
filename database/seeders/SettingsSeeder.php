<?php

namespace Database\Seeders;

use App\Models\Setting; // Pastikan ini di-import
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Setting::truncate();

        // Teks dari CV Anda
        Setting::create([
            'key' => 'about_me_text',
            'value' => 'Saya adalah IT enthusiast dengan pengalaman dalam pemrograman, troubleshooting, dan pengelolaan sistem. Saya telah menyelesaikan beberapa proyek seperti NuCle Factory Outlet, MOovers, Saving Money dan dikenal sebagai pribadi analitis, problem-solver, dan cepat belajar. Saya berambisi untuk berkarier di bidang IT teknis dan mencari posisi yang memungkinkan saya mengembangkan skill teknis sekaligus memberikan solusi efektif bagi perusahaan.'
        ]);

        // Filosofi Duta Kampus Anda
        Setting::create([
            'key' => 'duta_kampus_philosophy',
            'value' => 'Menjadi seorang pemimpin, tidak hanya berbica tentang bagaimana menjadi penggerak sebuah kelompok. Tetapi saat saya menjadi pemimpin, saya menjadi rumah bagi anggota saya. Merasa aman, didengarkan, diwakilkan, dan di hargai, rasa itu harus timbul di setiap individu yang saya pimpim. Keprofesionalan didalam kekeluargaan akan menjadi mantra tumbuhnya organisasi yang hebat. Menjadikan DUTA KAMPUS UMMI menjadi rumah bagi setiap insan yang hidup didalamnya.'
        ]);
        
        // Data lain yang bisa di-edit
        Setting::create(['key' => 'github_link', 'value' => 'https://github.com/liefhax']);
        Setting::create(['key' => 'linkedin_link', 'value' => 'https://linkedin.com/in/namaanda']);
        Setting::create(['key' => 'cv_url', 'value' => 'dokumen/CV_Naufal_Atilah.pdf']);
    }
}