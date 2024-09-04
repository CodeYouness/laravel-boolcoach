<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $coaches_id = User::all()->pluck("id");

        for ($i=0; $i < 10; $i++) {
            $data = [
                'coach_id' => $faker->randomElement($coaches_id),
                'username' => $faker->name(),
                'email' => $faker->email(),
                'description' => $faker->paragraph()
            ];
            Review::create($data);
        }
    }
}