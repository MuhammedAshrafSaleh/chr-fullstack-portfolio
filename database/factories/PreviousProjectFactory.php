<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreviousProject>
 */
class PreviousProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ['en' => $this->faker->sentence(3), 'ar' => 'مشروع '.$this->faker->word()],
            'subtitle' => ['en' => $this->faker->sentence(5), 'ar' => 'عنوان فرعي '.$this->faker->word()],
            'description' => ['en' => $this->faker->paragraph(3), 'ar' => 'وصف المشروع: '.$this->faker->paragraph(2)],
            'location' => ['en' => $this->faker->city(), 'ar' => 'مدينة '.$this->faker->word()],
            'size' => ['en' => $this->faker->numberBetween(100, 5000).' sqm', 'ar' => $this->faker->numberBetween(100, 5000).' متر مربع'],
            'status' => ['en' => $this->faker->randomElement(['Completed', 'In Progress', 'Pending']), 'ar' => $this->faker->randomElement(['مكتمل', 'قيد التنفيذ', 'معلق'])],
            'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
        ];
    }
}
