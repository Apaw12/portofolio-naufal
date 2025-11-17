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
        // Tabel ini menghubungkan post dengan category (Many-to-Many)
        Schema::create('category_post', function (Blueprint $table) {
            // Kolom 1: Menghubungkan ke tabel 'categories'
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            // Kolom 2: Menghubungkan ke tabel 'posts'
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            
            // Membuat kedua kolom di atas menjadi Primary Key bersamaan
            $table->primary(['category_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
    }
};