<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ConstructionUpdateProject extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['head', 'subhead'];

    protected $fillable = ['construction_update_id', 'head', 'subhead', 'media', 'youtube_link'];

    public function constructionUpdate()
    {
        return $this->belongsTo(ConstructionUpdate::class);
    }
}