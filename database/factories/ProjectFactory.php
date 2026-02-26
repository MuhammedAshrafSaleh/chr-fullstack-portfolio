<?php

namespace Database\Factories;

use App\Models\CurrentProject;
use App\Models\Project;
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
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'current_project_id' => CurrentProject::inRandomOrder()->first()?->id ?? 1,
            'title' => [
                'en' => fake()->sentence(3),
                'ar' => 'مشروع: '.fake()->word(),
            ],
            'subtitle' => [
                'en' => fake()->sentence(6),
                'ar' => 'وصف: '.fake()->sentence(4),
            ],
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
        ];
    }
}
