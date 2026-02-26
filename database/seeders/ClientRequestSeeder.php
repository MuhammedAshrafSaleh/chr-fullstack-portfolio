<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientRequest;

class ClientRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientRequest::factory()->count(10)->create();

    }
}
