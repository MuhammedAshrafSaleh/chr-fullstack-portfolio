<?php

namespace Database\Seeders;

use App\Models\ConstructionUpdateProject;
use Illuminate\Database\Seeder;

class ConstructionUpdateProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConstructionUpdateProject::factory()->count(6)->create();
    }
}
