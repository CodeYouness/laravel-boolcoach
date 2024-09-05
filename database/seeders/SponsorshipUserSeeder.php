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

        $plans =[
            'basic' =>[
                "name" => "Basic",
                "price" => 2.99,
                "time" => "24:00:00",
            ],
            'standard'=>[
                "name" => "Standard",
                "price" => 5.99,
                "time" => "72:00:00",
            ],
            'premium' =>[
                "name" => "Premium",
                "price" => 9.99,
                "time" => "144:00:00",
            ]
        ];


        foreach ($random_sponsored_users as $random_user) {
            // Seleziona casualmente un ID di sponsorizzazione
            $random_sponsorship_id = $faker->randomElement($sponsorship_ids);

            // Trova la sponsorizzazione selezionata
            $selected_sponsorship = Sponsorship::findOrFail($random_sponsorship_id);

            // Estrarre la durata dal campo "time" (formato HH:MM:SS)
            [$hours, $minutes, $seconds] = explode(':', $selected_sponsorship->time);

            // Calcolo delle date di inizio e fine
            $start_date = Carbon::now();

            $end_date = $start_date->copy()->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);

            // Inserisci la sponsorizzazione nella tabella pivot con start_date e end_date
            $random_user->sponsorships()->attach($random_sponsorship_id, [
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }
        }
}

//! c'è un problema per come è gestita la durata delle sponsorships

