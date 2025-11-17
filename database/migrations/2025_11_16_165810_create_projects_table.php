<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Perintah untuk MEMBUAT tabel 'projects'
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul project
            $table->string('slug')->unique(); // Untuk URL cantik (misal: /projects/nucle-factory-outlet)
            $table->text('description'); // Deskripsi lengkap project
            $table->string('image')->nullable(); // Path ke file gambar/screenshot
            $table->string('project_url')->nullable(); // Link ke demo live (jika ada)
            $table->string('repo_url')->nullable(); // Link ke GitHub
            $table->json('technologies')->nullable(); // Menyimpan teknologi sbg array JSON (misal: ["CodeIgniter"])
            $table->boolean('is_featured')->default(false); // Tandai jika ingin tampil di homepage
            $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Perintah untuk MENGHAPUS tabel 'projects' jika migrasi di-rollback
        Schema::dropIfExists('projects');
    }
};