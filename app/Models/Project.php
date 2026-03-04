<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'subtitle'];

    protected $fillable = [
        'current_project_id',
        'title',
        'subtitle',
        'longitude',
        'latitude',
    ];

    public function currentProject()
    {
        return $this->belongsTo(CurrentProject::class);
    }

    public function details()
    {
        return $this->hasMany(ProjectDetail::class);
    }

    public function headings()
    {
        return $this->hasMany(ProjectHeading::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function plans()
    {
        return $this->hasMany(ProjectPlan::class);
    }

    public function services()
    {
        return $this->hasMany(ProjectService::class);
    }
}
