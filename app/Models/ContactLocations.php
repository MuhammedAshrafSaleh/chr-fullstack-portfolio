<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactLocations extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = [
        'location_one_title',
        'location_one_address_one',
        'location_one_address_two',
        'location_one_address_three',
        'location_two_title',
        'location_two_address_one',
        'location_two_address_two',
        'location_two_address_three',
    ];

    protected $fillable = [
        'location_one_title',
        'location_one_address_one',
        'location_one_address_two',
        'location_one_address_three',
        'location_one_navigate_url',
        'location_two_title',
        'location_two_address_one',
        'location_two_address_two',
        'location_two_address_three',
        'location_two_navigate_url',
        'phone',
    ];
}
