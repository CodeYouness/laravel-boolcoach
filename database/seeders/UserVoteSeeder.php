<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;
use App\Models\User;
use Faker\Generator as Faker;

class UserVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = User::all();
        $vote_ids = Vote::all()->pluck("id");

        foreach ($users as $user) {
            $random_votes = $faker->randomElements($vote_ids, $faker->numberBetween(10, 20), true);
            $user->votes()->attach($random_votes);
        }
    }
}
