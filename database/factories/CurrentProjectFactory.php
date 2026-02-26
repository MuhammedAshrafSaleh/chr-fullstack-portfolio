<?php

namespace Database\Factories;

use App\Models\CurrentProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CurrentProject>
 */
class CurrentProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CurrentProject::class;

    public function definition(): array
    {
        return [
            'title' => [
                'en' => fake()->sentence(3),
                'ar' => 'مشروع: '.fake()->word(),
            ],
            'subtitle' => [
                'en' => fake()->sentence(2),
                'ar' => 'وصف: '.fake()->word(),
            ],
            'description' => [
                'en' => fake()->paragraph(),
                'ar' => 'تفاصيل: '.fake()->paragraph(),
            ],
            'location' => [
                'en' => fake()->city().', Egypt',
                'ar' => fake()->city().'، مصر',
            ],
            'size' => [
                'en' => fake()->numberBetween(10, 500).',000 sqm',
                'ar' => fake()->numberBetween(10, 500).',000 متر مربع',
            ],
            'status' => [
                'en' => fake()->randomElement(['Under Construction', 'Completed', 'Coming Soon']),
                'ar' => fake()->randomElement(['تحت الإنشاء', 'مكتمل', 'قريباً']),
            ],
            'image' => null,
        ];
    }
}
