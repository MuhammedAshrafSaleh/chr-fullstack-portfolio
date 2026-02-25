<?php

namespace Database\Seeders;

use App\Models\CurrentProject;
use Illuminate\Database\Seeder;

class CurrentProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CurrentProject::factory()->count(5)->create();
    }
}
