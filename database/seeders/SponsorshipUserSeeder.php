<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class SponsorshipUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = User::all();
        $sponsorship_ids = Sponsorship::all()->pluck('id')->toArray();

        $random_sponsored_users = $faker->randomElements($users, $faker->numberBetween(3, 8));

        foreach ($random_sponsored_users as $random_user) {
            $random_sponsorship_id = $faker->randomElement($sponsorship_ids);

            $selected_sponsorship = Sponsorship::findOrFail($random_sponsorship_id);

            $duration_in_hours = $selected_sponsorship->time;

            $start_date = Carbon::now();
            $end_date = $start_date->copy()->addHours($duration_in_hours);

            $random_user->sponsorships()->attach($random_sponsorship_id, [
                'start_date' => $start_date->format('Y-m-d H:i:s'),
                'end_date' => $end_date->format('Y-m-d H:i:s'),
            ]);
        }
        }
}

