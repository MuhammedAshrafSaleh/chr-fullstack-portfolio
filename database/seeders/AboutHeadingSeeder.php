<?php

namespace Database\Seeders;

use App\Models\AboutHeading;
use Illuminate\Database\Seeder;

class AboutHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutHeading::create([
            'about_numbers_title' => [
                'en' => 'Our Numbers',
                'ar' => 'أرقامنا',
            ],
            'about_numbers_subtitle' => [
                'en' => 'Milestones that reflect our journey',
                'ar' => 'إنجازات تعكس مسيرتنا',
            ],
            'testimonials_title' => [
                'en' => 'What Our Clients Say',
                'ar' => 'ما يقوله عملاؤنا',
            ],
            'testimonials_subtitle' => [
                'en' => 'Real experiences from real people',
                'ar' => 'تجارب حقيقية من أشخاص حقيقيين',
            ],
            'about_ceo_title' => [
                'en' => 'CEO Message',
                'ar' => 'رسالة الرئيس التنفيذي',
            ],
            'about_ceo_subtitle' => [
                'en' => 'A word from our founder',
                'ar' => 'كلمة من مؤسسنا',
            ],
            'features_title' => [
                'en' => 'Our Features',
                'ar' => 'مميزاتنا',
            ],
            'features_subtitle' => [
                'en' => 'Why choose us',
                'ar' => 'لماذا تختارنا',
            ],
            'team_title' => [
                'en' => 'Our Team',
                'ar' => 'فريقنا',
            ],
            'team_subtitle' => [
                'en' => 'The people behind our success',
                'ar' => 'الأشخاص وراء نجاحنا',
            ],
        ]);
    }
}
