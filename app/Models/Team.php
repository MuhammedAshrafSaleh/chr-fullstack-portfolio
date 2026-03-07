<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'subtitle'];

    protected $fillable = ['title', 'subtitle', 'image', 'linkedin_link'];
}
