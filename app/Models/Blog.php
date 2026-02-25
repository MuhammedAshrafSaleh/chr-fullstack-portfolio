<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'slug', 'excerpt', 'content', 'author_name'];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'published_at',
        'author_name',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
