<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

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
        $user = User::query()->pluck('id')->toArray();
        return [
            'user_id' => Arr::random($user),
            'job_title' => fake()->words(5, true),
            "job_description" => fake()->text(),
            "job_requirement" => fake()->text(),
            "job_benefit" => fake()->text(),
            'min_salary' => fake()->randomFloat(3, true),
            'max_salary' => fake()->randomFloat(4, true),
            'start_date' => fake()->date('Y-m-d'),
            'end_date' => fake()->date('Y-m-d'),
            "number_applicants" => fake()->biasedNumberBetween(1, 10),
            "slug" => fake()->slug,
            "site" => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}