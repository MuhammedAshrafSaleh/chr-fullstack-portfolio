<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectDetail extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'subtitle'];

    protected $fillable = ['project_id', 'title', 'subtitle'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
