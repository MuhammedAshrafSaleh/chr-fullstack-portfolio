<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ChrAbout extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'chr_about';

    public $translatable = ['eyebrow', 'title', 'paragraph_one', 'paragraph_two'];

    protected $fillable = ['eyebrow', 'title', 'paragraph_one', 'paragraph_two', 'image'];
}
