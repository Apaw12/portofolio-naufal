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
    Schema::create('posts', function (Blueprint $table) {
        $table->id();

        // Relasi ke User (admin) - (Kode yang sudah Anda buat)
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        // Relasi ke Category (WAJIB)
        $table->foreignId('category_id')->constrained()->onDelete('cascade');

        // Kolom Konten (Sudah sesuai yang Anda buat)
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('excerpt'); // Ringkasan singkat artikel
        $table->longText('body'); // Isi artikel lengkap
        $table->string('image')->nullable(); // Gambar utama artikel

        // Kolom Status (WAJIB)
        $table->boolean('is_published')->default(false); // Status publikasi: Default Belum

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};