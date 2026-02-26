<?php

namespace Database\Seeders;

use App\Models\ChrAbout;
use Illuminate\Database\Seeder;

class ChrAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChrAbout::create([
            'eyebrow' => ['en' => 'TRUE TO YOU', 'ar' => 'صادقون معك'],
            'title' => ['en' => 'ABOUT CHR',   'ar' => 'عن CHR'],
            'paragraph_one' => [
                'en' => 'Crafting transformative residential and commercial experiences...',
                'ar' => 'نصنع تجارب سكنية وتجارية استثنائية...',
            ],
            'paragraph_two' => [
                'en' => 'We inspire limitless possibilities that empower communities...',
                'ar' => 'نلهم إمكانيات لا حدود لها تمكّن المجتمعات...',
            ],
            'image' => null,
        ]);
    }
}
