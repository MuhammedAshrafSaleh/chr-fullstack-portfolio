<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\ProjectDetail;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectDetail>
 */
class ProjectDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProjectDetail::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first()?->id ?? 1,
            'title' => [
                'en' => fake()->sentence(3),
                'ar' => 'عنوان: '.fake()->word(),
            ],
            'subtitle' => [
                'en' => fake()->sentence(6),
                'ar' => 'وصف: '.fake()->word(),
            ],
        ];
    }
}
