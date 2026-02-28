<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectHeading;
class ProjectHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
       public function run(): void
    {
        ProjectHeading::create([
            'details_heading'     => ['en' => 'Project Details',               'ar' => 'تفاصيل المشروع'],
            'details_subheading'  => ['en' => 'Learn more about this project', 'ar' => 'تعرف أكثر على هذا المشروع'],
            'images_heading'      => ['en' => 'Project Images',                'ar' => 'صور المشروع'],
            'images_subheading'   => ['en' => 'Explore our project gallery',   'ar' => 'استعرض معرض صور المشروع'],
            'services_heading'    => ['en' => 'Our Services',                  'ar' => 'خدماتنا'],
            'services_subheading' => ['en' => 'What we offer in this project', 'ar' => 'ما نقدمه في هذا المشروع'],
            'plans_heading'       => ['en' => 'Project Plans',                 'ar' => 'خطط المشروع'],
            'plans_subheading'    => ['en' => 'Explore our available plans',   'ar' => 'استعرض الخطط المتاحة'],
            'location_heading'    => ['en' => 'Project Location',              'ar' => 'موقع المشروع'],
            'location_subheading' => ['en' => 'Find us on the map',            'ar' => 'جدنا على الخريطة'],
        ]);
    }
}
