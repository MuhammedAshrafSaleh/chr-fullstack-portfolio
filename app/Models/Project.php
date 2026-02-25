<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title'];

    protected $fillable = ['title', 'longitude', 'latitude', 'current_project_id'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function details()
    {
        return $this->hasMany(ProjectDetail::class);
    }

    public function services()
    {
        return $this->hasMany(ProjectService::class);
    }

    public function plans()
    {
        return $this->hasMany(ProjectPlan::class);
    }

    public function heading()
    {
        return $this->hasOne(ProjectHeading::class);
    }

    public function currentProjects()
    {
        return $this->hasOne(CurrentProject::class);
    }
}
