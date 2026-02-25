<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
                'en' => $this->faker->sentence(3),
                'ar' => 'مشروع '.$this->faker->word(),
            ],
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
        ];
    }
}
