<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = Factory::create();
        $user = User::query()->pluck('id')->toArray();
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'user_id' => Arr::random($user),
                'job_title' => $faker->words(5, true),
                "min_salary" => $faker->randomFloat(3, true),
                "max_salary" => $faker->randomFloat(4, true),
                "job_description" => $faker->text(),
                "job_requirement" => $faker->text(),
                "job_benefit" => $faker->text(),
                "start_date" =>$faker->date('Y-m-d'),
                "end_date" =>$faker->date('Y-m-d'),
                "number_applicants" => $faker->biasedNumberBetween(1, 10),
                "slug" =>$faker->slug(),
                'site' => $faker->boolean,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            if ($i % 100 === 0) {
                Post::insert($arr);
                $arr = [];
            }
        }
    }
}
