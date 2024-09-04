<?php

namespace Database\Seeders;

use App\Models\sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans =[
                [
                    "name" => "Basic",
                    "price" => 2.99,
                    "time" => "24:00:00",
                ],
                [
                    "name" => "Standard",
                    "price" => 5.99,
                    "time" => "72:00:00",
                ],
                [
                    "name" => "Premium",
                    "price" => 9.99,
                    "time" => "144:00:00",
                ]
            ];

            foreach ($plans as $plan) {
                sponsorship::create($plan);
            }
    }
}