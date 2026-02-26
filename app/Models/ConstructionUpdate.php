<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ConstructionUpdate extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'subtitle'];

    protected $fillable = ['title', 'video', 'subtitle'];

    public function projects()
    {
        return $this->hasOne(ConstructionUpdateProject::class);
    }
}
