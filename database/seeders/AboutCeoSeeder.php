<?php

namespace Database\Seeders;

use App\Models\AboutCeo;
use Illuminate\Database\Seeder;

class AboutCeoSeeder extends Seeder
{
    public function run(): void
    {
        AboutCeo::create([
            'title' => [
                'en' => 'OUR CEO MESSAGE',
                'ar' => 'رسالة الرئيس التنفيذي',
            ],
            'paragraph_one' => [
                'en' => 'Our success is rooted in a legacy of evolving knowledge and lasting partnerships...',
                'ar' => 'نجاحنا متجذر في إرث من المعرفة المتطورة والشراكات الدائمة...',
            ],
            'paragraph_two' => [
                'en' => 'With deep insights, we have delivered dozens of developments across Egypt...',
                'ar' => 'بفهم عميق، قدمنا عشرات المشاريع في جميع أنحاء مصر...',
            ],
            'paragraph_three' => [
                'en' => 'We aim to build not just exceptional developments, but fully integrated communities...',
                'ar' => 'نهدف إلى بناء مجتمعات متكاملة لا مجرد مشاريع استثنائية...',
            ],
            'ceo_name' => [
                'en' => 'ENG. AMR SULTAN',
                'ar' => 'م. عمرو سلطان',
            ],
            'ceo_title' => [
                'en' => 'FOUNDER & CEO',
                'ar' => 'المؤسس والرئيس التنفيذي',
            ],
            'image' => null,
        ]);
    }
}
