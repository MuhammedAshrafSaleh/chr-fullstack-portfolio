<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hero extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable = [
        'title', 
        'subtitle', 
        'button_name', 
        'button_url', 
        'video_url', 
        'status'
    ];

    public $translatable = ['title', 'subtitle', 'button_name'];

    // Ensure JSON fields are handled correctly by Laravel's underlying layer
    protected $casts = [
        'status' => 'boolean',
    ];
}
