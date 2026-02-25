<?php

namespace Database\Factories;

use App\Models\Project;
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
    public function definition(): array
    {
        return [
            'title' => [
                'en' => $this->faker->sentence(3),
                'ar' => 'مشروع '.$this->faker->word(),
            ],
            'subtitle' => [
                'en' => $this->faker->sentence(5),
                'ar' => 'عنوان فرعي '.$this->faker->word(),
            ],
            'description' => [
                'en' => $this->faker->paragraph(3),
                'ar' => 'وصف المشروع: '.$this->faker->paragraph(2),
            ],
            'location' => [
                'en' => $this->faker->city().', '.$this->faker->country(),
                'ar' => 'مدينة '.$this->faker->city(),
            ],
            'size' => [
                'en' => $this->faker->numberBetween(100, 5000).' sqm',
                'ar' => $this->faker->numberBetween(100, 5000).' متر مربع',
            ],
            'status' => [
                'en' => $this->faker->randomElement(['In Progress', 'Under Review', 'Planning']),
                'ar' => $this->faker->randomElement(['قيد التنفيذ', 'قيد المراجعة', 'مرحلة التخطيط']),
            ],
            'image' => 'default-project.jpg',
            'project_id' => Project::inRandomOrder()->first()->id,
        ];
    }
}
