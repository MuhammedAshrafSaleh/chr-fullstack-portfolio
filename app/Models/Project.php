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
}
