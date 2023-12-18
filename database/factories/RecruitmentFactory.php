<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecruitmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'post_id' => fake()->post_id,
            'cover_letter' => fake()->paragraph(),
            'name' => fake()->name(),
            "phone" => fake()->phoneNumber(),
            "email" => fake()->email(),
            "file" => fake()->word(),
        ];
    }
}
