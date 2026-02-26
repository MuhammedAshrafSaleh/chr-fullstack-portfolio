<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['review', 'name', 'title'];

    protected $fillable = ['rate', 'review', 'name', 'title', 'image'];
}
