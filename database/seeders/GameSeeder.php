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
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ84F6XVqPPwVdxpBdDjhc87vkizlQNoEhE3g&s"
            ],
            [
                "name" => "FIFA 25",
                "genre" => "Sports",
                "img" => "https://fifauteam.com/images/fc25/logo/long-green.webp"
            ],
            [
                "name" => "Overwatch",
                "genre" => "Hero Shooter",
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCJgtZ2lZYNZI7jMS1E-Mh98VZgxb5EkfLtQ&s"
            ],
            [
                "name" => "Rocket League",
                "genre" => "Sports/Car Soccer",
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaj4WB0eeIGj68RxccVHG09nAeD0WuVkrBRA&s"
            ]
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}