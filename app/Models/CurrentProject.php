<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CurrentProject extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'subtitle', 'description', 'location', 'size', 'status'];

    protected $fillable = ['title', 'subtitle', 'description', 'location', 'size', 'status', 'image'];

    public function project()
    {
        return $this->hasOne(Project::class, 'current_project_id');
    }
}
