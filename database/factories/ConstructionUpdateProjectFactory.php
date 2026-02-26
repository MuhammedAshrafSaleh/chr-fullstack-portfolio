<?php

namespace Database\Factories;

use App\Models\ConstructionUpdate;
use App\Models\ConstructionUpdateProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstructionUpdateProjectFactory extends Factory
{
    protected $model = ConstructionUpdateProject::class;

    public function definition(): array
    {
        return [
            'construction_update_id' => ConstructionUpdate::inRandomOrder()->first()?->id ?? 1,
            'head' => ['en' => fake()->sentence(3), 'ar' => 'رأس: '.fake()->word()],
            'subhead' => ['en' => fake()->sentence(6), 'ar' => 'عنوان فرعي: '.fake()->word()],
            'media' => null,
        ];
    }
}
