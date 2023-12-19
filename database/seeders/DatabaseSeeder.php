<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Recruitments;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 1; $i <= 5; $i++) {
            User::factory()->create();
            Post::factory()->create();
            Recruitments::factory()->create();
        }

//        $this->call([
//            UserSeeder::class,
//            PostSeeder::class,
////            RecruitmentsSeeder::class,
//        ]);
    }
}
