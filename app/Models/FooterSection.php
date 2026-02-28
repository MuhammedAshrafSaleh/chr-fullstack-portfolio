<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class FooterSection extends Model
{
    use HasTranslations;

    public array $translatable = ['message', 'rights', 'policy_title', 'terms_title'];

    protected $fillable = [
        'message',
        'rights',
        'policy_title',
        'policy_link',
        'terms_title',
        'terms_link',
    ];
}