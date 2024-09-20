<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $coaches_id = User::all()->pluck('id');

        for ($i=0; $i < 100; $i++) {
            $data = [
                'coach_id' => $faker->randomElement($coaches_id),
                'username' => $faker->userName(),
                'title'=> $faker->sentence(rand(2, 5)),
                'content' => $faker->realText(500),
                'email'=> $faker->email(),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ];

            Message::create($data);
        }
    }
}