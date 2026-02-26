<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConstructionUpdate>
 */
class ConstructionUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => fake()->sentence(3),
                'ar' => 'تحديث: '.fake()->sentence(3),
            ],
            'subtitle' => [
                'en' => fake()->sentence(3),
                'ar' => 'تحديث: '.fake()->sentence(3),
            ],
            'video' => null,
        ];
    }
}
