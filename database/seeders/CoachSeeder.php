<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coach;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $prices = [];
        for ($i=0; $i < 10; $i++) {
            $data = [
                'name' => $faker->name(),
                'surname' => $faker->lastName(),
                'nickname' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'language' => $faker->languageCode(),
                "password"=> Hash::make($faker->password()),
                'summary'=> $faker->realTextBetween(1000, 4500),
                'img_url'=> $faker->imageUrl(),
                'price'=>$faker->randomFloat(2, 9.99, 24.99),
                'is_available'=>$faker->boolean(100)
            ];

            Coach::create($data);
        }
    }
}
