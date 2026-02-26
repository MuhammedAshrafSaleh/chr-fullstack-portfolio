<?php

namespace Database\Seeders;

use App\Models\AboutNumber;
use Illuminate\Database\Seeder;

class AboutNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutNumber::factory()->count(8)->create();
    }
}
