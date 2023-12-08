<?php

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create();
        $positions = Position::query()->pluck('id')->toArray();
        for($i = 1; $i <= 100; $i++){
            $arr[] = [
                'name'     => $faker->firstName . ' ' . $faker->lastName,
                'avatar' => $faker->imageUrl(120, 120),
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'role' => $faker->randomElement(UserRolesEnum::getValues()),
//                'position_id' => $positions[array_rand($positions)],
                'position_id' => Arr::random($positions),
                'gender' => $faker->boolean,
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
