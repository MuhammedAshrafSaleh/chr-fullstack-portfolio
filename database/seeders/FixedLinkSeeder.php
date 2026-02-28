<?php

namespace Database\Seeders;

use App\Models\FixedLink;
use Illuminate\Database\Seeder;

class FixedLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FixedLink::create([
            'logo_image' => 'fixed_links/placeholder.png',
            'logo_link' => 'https://example.com',
            'whatsapp_image' => 'fixed_links/placeholder.png',
            'whatsapp_link' => 'https://wa.me/201234567890',
            'location_image' => 'fixed_links/placeholder.png',
            'location_link' => 'https://maps.google.com/',
            'hotline_image' => 'fixed_links/placeholder.png',
            'hotline_link' => 'tel:+201234567890',
        ]);
    }
}
