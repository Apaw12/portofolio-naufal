<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignable).
     */
    protected $fillable = [
        'user_id',      // WAJIB ADA (DARI AUTH)
        'category_id',  // WAJIB ADA (DARI FORM)
        'title',
        'slug',
        'excerpt',      // WAJIB ADA (DARI FORM)
        'body',         // WAJIB ADA (DARI FORM)
        'image',
        'is_published',
    ];

    /**
     * Casts agar is_published bertipe boolean.
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    // --- RELATIONS ---

    /**
     * Relasi: Sebuah Post dimiliki oleh satu User (Penulis).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Sebuah Post dimiliki oleh satu Category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}