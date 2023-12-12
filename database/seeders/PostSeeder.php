<?php

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Enums\UserRoleEnum;
use App\Models\Position;
use App\Models\Post;
use App\Models\User;
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
        $faker = \Faker\Factory::create();
        $user = User::query()->pluck('id')->toArray();
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'user_id' => Arr::random($user),
                'job_title' => $faker->words(5, true),
                'status' => Arr::random([0, 1]),
                "district" => 'Hai Chau',
                "city" => 'Da Nang',
                "remote" => false,
                "can_parttime" => false,
                "min_salary" => $faker->randomFloat(3, true),
                "max_salary" => $faker->randomFloat(4, true),
                "currency_salary" => 1,
                "job_description" => $faker->text(),
                "job_requirement" => $faker->text(),
                "job_benefit" => $faker->text(),
                "start_date" =>$faker->date(),
                "end_date" =>$faker->date(),
                "number_applicants" => $faker->biasedNumberBetween(1, 10),
                "slug" =>$faker->slug(),
            ];
            if ($i % 100 === 0) {
                Post::insert($arr);
                $arr = [];
            }
        }
    }
}
