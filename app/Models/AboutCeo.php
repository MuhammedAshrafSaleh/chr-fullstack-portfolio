<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutCeo extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'about_ceo';

    public $translatable = [
        'title',
        'paragraph_one',
        'paragraph_two',
        'paragraph_three',
        'ceo_name',
        'ceo_title',
    ];

    protected $fillable = [
        'title',
        'paragraph_one',
        'paragraph_two',
        'paragraph_three',
        'ceo_name',
        'ceo_title',
        'image',
    ];
}
