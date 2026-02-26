<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate' => fake()->randomFloat(1, 3.5, 5.0),
            'review' => [
                'en' => fake()->paragraph(2),
                'ar' => 'تقييم: '.fake()->paragraph(2),
            ],
            'name' => [
                'en' => fake()->name(),
                'ar' => fake()->name(),
            ],
            'title' => [
                'en' => fake()->jobTitle(),
                'ar' => 'مسمى: '.fake()->word(),
            ],
            'image' => null,
        ];
    }
}
