<?php

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'developer',
            'tester',
            'admin',
            'marketing',
            'ASO',
            'marketing',
            '3D_des_game',
            '2D_des_game',
        ];

        foreach ($arr as $each) {
            Position::firstOrCreate(['value'=>$each]);
        }
    }
}
