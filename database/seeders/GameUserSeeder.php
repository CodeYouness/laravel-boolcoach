<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\User;
use Faker\Generator as Faker;
class GameUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = User::all();
        $game_ids = Game::all()->pluck('id');

        foreach ($users as $user) {
            $random_game_ids = $faker->randomElements($game_ids, $faker->numberBetween(1, 3));
            $user->games()->sync($random_game_ids);
        }
    }
}
