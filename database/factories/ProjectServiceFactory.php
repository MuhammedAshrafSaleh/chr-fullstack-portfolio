<?php

namespace Database\Factories;
use App\Models\Project;
use App\Models\ProjectService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectService>
 */
class ProjectServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   protected $model = ProjectService::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first()?->id ?? 1,
            'image'      => 'uploads/project_services/placeholder.jpg',
            'title'      => [
                'en' => fake()->sentence(3),
                'ar' => 'عنوان: ' . fake()->word(),
            ],
            'subtitle'   => [
                'en' => fake()->sentence(6),
                'ar' => 'وصف: ' . fake()->word(),
            ],
        ];
    }
}
