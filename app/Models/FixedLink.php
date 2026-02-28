<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_image',
        'logo_link',
        'whatsapp_image',
        'whatsapp_link',
        'location_image',
        'location_link',
        'hotline_image',
        'hotline_link',
    ];
}
