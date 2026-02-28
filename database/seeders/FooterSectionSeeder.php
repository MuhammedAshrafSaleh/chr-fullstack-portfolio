<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FooterSection;
class FooterSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterSection::create([
            'message' => [
                'en' => 'Building the future together with innovation and excellence.',
                'ar' => 'نبني المستقبل معاً بالابتكار والتميز.',
            ],
            'rights' => [
                'en' => 'All rights reserved © 2024',
                'ar' => 'جميع الحقوق محفوظة © 2024',
            ],
            'policy_title' => [
                'en' => 'Privacy Policy',
                'ar' => 'سياسة الخصوصية',
            ],
            'policy_link' => '/privacy-policy',
            'terms_title' => [
                'en' => 'Terms & Conditions',
                'ar' => 'الشروط والأحكام',
            ],
            'terms_link' => '/terms',
        ]);
    }
}
