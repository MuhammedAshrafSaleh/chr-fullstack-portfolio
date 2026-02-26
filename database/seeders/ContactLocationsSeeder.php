<?php

namespace Database\Seeders;

use App\Models\ContactLocations;
use Illuminate\Database\Seeder;

class ContactLocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactLocations::create([
            'location_one_title' => ['en' => 'HEADQUARTER',               'ar' => 'المقر الرئيسي'],
            'location_one_address_one' => ['en' => '4 Nasr St, Golden Square,', 'ar' => '4 شارع نصر، جولدن سكوير،'],
            'location_one_address_two' => ['en' => 'New Cairo,',                'ar' => 'القاهرة الجديدة،'],
            'location_one_address_three' => ['en' => 'Cairo, Egypt',              'ar' => 'القاهرة، مصر'],
            'location_one_navigate_url' => 'https://maps.google.com/?q=New+Cairo',

            'location_two_title' => ['en' => 'SHEIKH ZAYED',              'ar' => 'الشيخ زايد'],
            'location_two_address_one' => ['en' => 'F3-5-3 Arkan Extension',    'ar' => 'F3-5-3 أركان إكستنشن'],
            'location_two_address_two' => ['en' => 'Sheikh Zayed',              'ar' => 'الشيخ زايد'],
            'location_two_address_three' => ['en' => 'Giza, Egypt',               'ar' => 'الجيزة، مصر'],
            'location_two_navigate_url' => 'https://maps.google.com/?q=Sheikh+Zayed',

            'phone' => '15722',
        ]);
    }
}
