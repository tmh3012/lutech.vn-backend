<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'job_title' => fake()->sentence(4, true),
            "job_description" => fake()->paragraph(),
            "job_requirement" => fake()->paragraph(),
            "job_benefit" => fake()->paragraph(),
            'min_salary' => fake()->numberBetween(100,5000),
            'max_salary' => fake()->numberBetween(100,5000),
            'start_date' => fake()->date('Y-m-d'),
            'end_date' => fake()->date('Y-m-d'),
            "number_applicants" => fake()->numberBetween(1, 1000),
            "slug" => fake()->slug,
            "site" => fake()->boolean(),
        ];
    }
}
