<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CurrentProject>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => fake()->sentence(4),
                'ar' => 'عنوان: '.fake()->word(),
            ],
            'slug' => [
                'en' => Str::slug(fake()->sentence(3)),
                'ar' => 'مقال-'.fake()->numberBetween(1, 999),
            ],
            'excerpt' => [
                'en' => fake()->paragraph(1),
                'ar' => 'ملخص: '.fake()->paragraph(1),
            ],
            'content' => [
                'en' => '<p>'.fake()->paragraphs(3, true).'</p>',
                'ar' => '<p>'.'محتوى المقال: '.fake()->paragraph(3).'</p>',
            ],
            'author_name' => [
                'en' => fake()->name(),
                'ar' => fake()->name(),
            ],
            'image' => null,
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
