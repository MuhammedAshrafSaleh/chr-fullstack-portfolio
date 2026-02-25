<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectService extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title'];

    protected $fillable = ['project_id', 'title', 'image'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
