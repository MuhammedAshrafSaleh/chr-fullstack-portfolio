<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProjectService extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title', 'subtitle'];

    protected $fillable = ['project_id', 'image', 'title', 'subtitle'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
