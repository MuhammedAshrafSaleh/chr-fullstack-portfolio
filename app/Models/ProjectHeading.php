<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class ProjectHeading extends Model
{
    use HasTranslations;

    public array $translatable = [
        'details_heading',  'details_subheading',
        'images_heading',   'images_subheading',
        'services_heading', 'services_subheading',
        'plans_heading',    'plans_subheading',
        'location_heading', 'location_subheading',
    ];

    protected $fillable = [
        'details_heading',  'details_subheading',
        'images_heading',   'images_subheading',
        'services_heading', 'services_subheading',
        'plans_heading',    'plans_subheading',
        'location_heading', 'location_subheading',
    ];
}