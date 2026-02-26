<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientRequest>
 */
class ClientRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'company' => fake()->company(),
            'subject' => fake()->sentence(4),
            'preferred_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'role' => fake()->randomElement(['Manager', 'Developer', 'Designer', 'CEO', 'Other']),
            'preferred_time' => fake()->time('H:i'),
        ];
    }
}
