<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutHome extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'about_home';

    public $translatable = [
        'section_label',
        'title',
        'description',
        'years_label',
        'projects_label',
        'workers_label',
        'feature_one',
        'feature_two',
        'feature_three',
        'feature_four',
        'feature_five',
    ];

    protected $fillable = [
        'section_label',
        'title',
        'description',
        'years_count',
        'years_label',
        'projects_count',
        'projects_label',
        'workers_count',
        'workers_label',
        'feature_one',
        'feature_two',
        'feature_three',
        'feature_four',
        'feature_five',
        'image_right',
        'image_left',
    ];
}
