<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'title' => [
                'en' => 'Crafting Landmark Properties',
                'ar' => 'صياغة عقارات بارزة',
            ],
            'description' => [
                'en' => 'At CHR Developments, we transform visionary concepts into architectural masterpieces. With an unwavering commitment to excellence, sustainability, and innovation, we create exceptional spaces that elevate lifestyles and set new standards in real estate development across the region.',
                'ar' => 'في CHR للتطوير، نحوّل الرؤى الإبداعية إلى تحف معمارية. بالتزام راسخ بالتميز والاستدامة والابتكار، نصنع مساحات استثنائية ترفع مستوى الحياة وتضع معايير جديدة في التطوير العقاري عبر المنطقة.',
            ],
            'video' => null,
        ]);
    }
}
