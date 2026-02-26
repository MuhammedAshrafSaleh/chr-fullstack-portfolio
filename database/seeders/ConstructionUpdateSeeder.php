<?php

namespace Database\Seeders;

use App\Models\ConstructionUpdate;
use Illuminate\Database\Seeder;

class ConstructionUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConstructionUpdate::factory()->count(3)->create();
    }
}
