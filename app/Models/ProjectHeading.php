<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectHeading extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'details_heading',
        'details_subheading',
        'services_heading',
        'services_subheading',
        'plans_heading',
        'plans_subheading',
    ];

    protected $fillable = [
        'project_id',
        'details_heading',
        'details_subheading',
        'services_heading',
        'services_subheading',
        'plans_heading',
        'plans_subheading',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
