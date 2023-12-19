<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class RecruitmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = Factory::create();
        $post = Post::query()->pluck('id')->toArray();
        for ($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'post_id' => Arr::random($post),
                "cover_letter" => $faker->text(),
                "name" => $faker->name(),
                "phone" => $faker->phoneNumber(),
                "email" =>$faker->email(),
                "file" =>$faker->word(),
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
