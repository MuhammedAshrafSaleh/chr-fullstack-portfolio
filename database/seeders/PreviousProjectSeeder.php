<?php

namespace Database\Seeders;

use App\Models\PreviousProject;
use Illuminate\Database\Seeder;

class PreviousProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PreviousProject::factory()->count(10)->create();
    }
}
