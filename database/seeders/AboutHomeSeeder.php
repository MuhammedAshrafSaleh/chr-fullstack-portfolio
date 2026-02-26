<?php

namespace Database\Seeders;

use App\Models\AboutHome;
use Illuminate\Database\Seeder;

class AboutHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutHome::create([
            'section_label' => [
                'en' => 'ABOUT US',
                'ar' => 'من نحن',
            ],
            'title' => [
                'en' => 'Innovative construction solutions',
                'ar' => 'حلول إنشائية مبتكرة',
            ],
            'description' => [
                'en' => 'Our open, flexible workspace encourages interaction and sparks inspiration, while dedicated areas provide quiet reflection.',
                'ar' => 'يشجع مكان عملنا المفتوح والمرن على التفاعل ويُلهم الإبداع، بينما توفر المناطق المخصصة هدوءاً للتأمل.',
            ],
            'years_count' => 20,
            'years_label' => ['en' => 'Year of Experience',  'ar' => 'سنة خبرة'],
            'projects_count' => 50,
            'projects_label' => ['en' => 'Successful Project',  'ar' => 'مشروع ناجح'],
            'workers_count' => 94,
            'workers_label' => ['en' => 'Trusted Workers',     'ar' => 'عامل موثوق'],
            'feature_one' => ['en' => 'Innovative Eco Power Technologies',               'ar' => 'تقنيات الطاقة البيئية المبتكرة'],
            'feature_two' => ['en' => 'Regularly Maintaining and Organizing your Tools', 'ar' => 'صيانة وتنظيم أدواتك بانتظام'],
            'feature_three' => ['en' => 'Experienced Construction Professional',            'ar' => 'محترف إنشاء ذو خبرة'],
            'feature_four' => ['en' => 'Mattis Fringilla Ultricies',                      'ar' => 'ماتيس فرينجيلا ألتريسيز'],
            'feature_five' => ['en' => '60 Team members are individuals',                 'ar' => '60 فرداً من أعضاء الفريق'],
            'image_right' => null,
            'image_left' => null,
        ]);
    }
}
