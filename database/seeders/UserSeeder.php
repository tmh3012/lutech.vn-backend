<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = Factory::create();
        for($i = 1; $i <= 100; $i++) {
            $arr[] = [
                'name'     => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'role' => $faker->randomElement(UserTypeEnum::getValues()),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            if($i % 100 === 0){
                User::insert($arr);
                $arr = [];
            }
        }
    }
}
