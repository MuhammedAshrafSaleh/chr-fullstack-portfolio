<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutHeading extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'about_numbers_title',
        'about_numbers_subtitle',
        'testimonials_title',
        'testimonials_subtitle',
        'about_ceo_title',
        'about_ceo_subtitle',
        'features_title',
        'features_subtitle',
        'team_title',
        'team_subtitle',
    ];

    protected $fillable = [
        'about_numbers_title',
        'about_numbers_subtitle',
        'testimonials_title',
        'testimonials_subtitle',
        'about_ceo_title',
        'about_ceo_subtitle',
        'features_title',
        'features_subtitle',
        'team_title',
        'team_subtitle',
    ];
}
