<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image', // Kita akan urus upload gambar nanti
        'project_url',
        'repo_url',
        'technologies',
        'is_featured',
    ];

    /**
     * Memberitahu Laravel cara menangani kolom 'technologies' (JSON).
     */
    protected $casts = [
        'technologies' => 'array',
        'is_featured' => 'boolean',
    ];
}