<?php

namespace Database\Factories;

use App\Models\AboutNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutNumber>
 */
class AboutNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AboutNumber::class;

    public function definition(): array
    {
        return [
            'number' => fake()->numerify('###').'+',
            'title' => [
                'en' => fake()->jobTitle(),
                'ar' => 'عنوان: '.fake()->word(),
            ],
            'subtitle' => [
                'en' => fake()->sentence(10),
                'ar' => 'وصف: '.fake()->sentence(8),
            ],
        ];
    }
}
