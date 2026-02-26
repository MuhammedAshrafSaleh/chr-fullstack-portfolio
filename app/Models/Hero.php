<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hero extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'hero';

    public $translatable = ['title', 'description'];

    protected $fillable = ['title', 'description', 'video'];
}
