<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialMedia>
 */
class SocialMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'social_media/placeholder.png',
            'title' => [
                'en' => fake()->word(),
                'ar' => 'تواصل: '.fake()->word(),
            ],
            'link' => 'https://'.fake()->domainName(),
        ];
    }
}
