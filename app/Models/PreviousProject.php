<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PreviousProject extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title', 'subtitle', 'description',
        'location', 'size', 'status', 'image',
    ];

    public $translatable = [
        'title', 'subtitle', 'description',
        'location', 'size', 'status',
    ];
}
