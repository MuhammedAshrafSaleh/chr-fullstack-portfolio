<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
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
                'en' => fake()->word(),
                'ar' => 'ميزة: '.fake()->word(),
            ],
            'desc' => [
                'en' => fake()->sentence(15),
                'ar' => 'وصف: '.fake()->sentence(12),
            ],
            'image' => null,
        ];
    }
}
