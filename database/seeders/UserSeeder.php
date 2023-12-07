<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 1000; $i++){
            $arr[] = [
                'name'     => $faker->firstName . ' ' . $faker->lastName,
                'avatar' => $faker->imageUrl(),
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'phone' => $faker->phoneNumber,
                'link' => null,
                'role' => $faker->randomElement(UserRoleEnum::getValues()),
                'bio' => $faker->boolean ? $faker->word : null,
                'position' => $faker->jobTitle,
                'gender' => $faker->boolean,
                'city' => $faker->city,
                'company_id' => $companies[array_rand($companies)],
            ];
            if($i % 1000 === 0){
                User::insert($arr);
                $arr = [];
            }
        }
    }
}
