<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\ProjectImage;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectImage>
 */
class ProjectImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProjectImage::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first()?->id ?? 1,
            'image' => 'uploads/project_images/placeholder.jpg',
            'title' => [
                'en' => fake()->sentence(3),
                'ar' => 'عنوان: '.fake()->word(),
            ],
        ];
    }
}
