<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                "name" => "League of Legends",
                "genre" => "MOBA",
                "img" => "https://cmsassets.rgpub.io/sanity/images/dsfx7636/news/9eb028de391e65072d06e77f06d0955f66b9fa2c-736x316.png?auto=format&fit=fill&q=80&w=625"
            ],
            [
                "name" => "Tom Clancy's Rainbow Six Siege",
                "genre" => "Tactical Shooter",
                "img" => "https://lh4.googleusercontent.com/proxy/KfJ1ocLrm9YZirEBMfXmhfY0MjKK1-Is3Nq_GHakYP0I82-8cVSquy9z4wyj4g4FKRs942NUY5-v9Z-_OOLuCpQELbjGVOdtSyoPACX9y0m78cpq_JnDCpDaoNG48Qq7pxkYAI0Jig"
            ],
            [
                "name" => "FIFA 25",
                "genre" => "Sports",
                "img" => "https://fifauteam.com/images/fc25/logo/long-green.webp"
            ],
            [
                "name" => "Overwatch",
                "genre" => "Hero Shooter",
                "img" => "https://1000logos.net/wp-content/uploads/2018/03/Overwatch-Logo.png"
            ],
            [
                "name" => "Rocket League",
                "genre" => "Sports/Car Soccer",
                "img" => "https://images.squarespace-cdn.com/content/v1/5e7bccc44c932c510af9fc1c/1612802612419-OHNURHWN9TI8PNFADEHU/Rocket_League.png"
            ]
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}