<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $languages = ['italiano', 'inglese', 'spagnolo', 'tedesco', 'russo', 'coreano', 'cinese', 'giapponese'];
        $array_img = [
            'https://toptwitchstreamers.com/wp-content/uploads/2020/02/Pengu-compressor.jpg',
            'https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcRk8SKKl8TSgTuEjwFILOIsa6qpjJDIygB5HKjjq62nkme7LMLPyoVob1t0cTDV2YWg6FtfhY9WXjLlbug',
            'https://cdn.oneesports.gg/cdn-data/2022/12/LeagueofLegends_LEC2023_Fnatic_Rekkles.jpg',
            'https://cdn.fifa.gg/cache/media/player/16823cce-c059-4348-a51b-a8a3df484e80/Image-of-player-HOLLYWOOD285-player-16823cce-c059-4348-a51b-a8a3df484e80.png?',
            'https://preview.redd.it/ultima-ora-dopo-aver-conquistato-liran-e-altri-paesi-v0-5ly83b53r7eb1.png?auto=webp&s=1a5538012a5263f6022c7b71008dad84c998b5ed'
        ];

        for ($i = 0; $i < 15; $i++) {
            $data = [
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'nickname' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'language' => $faker->randomElement($languages),
                "password" => Hash::make($faker->password()),
                'summary' => $faker->realTextBetween(200, 1000),
                'img_url' => $faker->randomElement($array_img),
                'price' => $faker->randomFloat(2, 9.99, 24.99),
                'is_available' => $faker->boolean(100)
            ];
            User::create($data);
        }

        //! DATI CUSTOM PER TESTARE l'APPLICAZIONE
        $fedeData =
            [
                'name' => 'federico',
                'surname' =>  'toscano',
                'nickname' => 'toscaf',
                'email' => 'federico@gmail.com',
                'language' => 'cavallones',
                "password" => Hash::make('12345678'),
                'summary' => 'Sono il coach federico, io non so giocare ma possiamo imparare insieme',
                'img_url' => 'https://media.licdn.com/dms/image/v2/D4D03AQH_R7jgmXSKHw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1724852967982?e=1732147200&v=beta&t=WRjP3QMd9kX5UasvrURyrr87WdjtUVe0YvHjMKTkymg',
                'price' => 9.99,
                'is_available' => true
            ];

        User::create($fedeData);

        $carlaData =
            [
                'name' => 'carla',
                'surname' =>  'lazzari',
                'nickname' => 'Fouili',
                'email' => 'carla@gmail.com',
                'language' => 'cavallones',
                "password" => Hash::make('12345678'),
                'summary' => 'Sono la coach carla e ti spacco con Teemo Top, scemo',
                'img_url' => 'https://i.ytimg.com/vi/EnmFUyjp27g/maxresdefault.jpg',
                'price' => 9.99,
                'is_available' => true
            ];

        User::create($carlaData);

        $younessData =
            [
                'name' => 'youness',
                'surname' =>  'lijassi',
                'nickname' => 'PentitoDiMafia',
                'email' => 'youness@gmail.com',
                'language' => 'cavallones arabo',
                "password" => Hash::make('12345678'),
                'summary' => 'Non ho precedenti penali, mai avuto a che fare con la mafia e mai stato coinvolto in trattati stato-mafia, tossicodipendente fin da piccolo ma bravo anche con le armi (in-game e irl)',
                'img_url' => 'https://avatars.githubusercontent.com/u/119518265?v=4',
                'price' => 999,
                'is_available' => true
            ];

        User::create($younessData);

        $riccardoData =
            [
                'name' => 'riccardo',
                'surname' =>  'petricca',
                'nickname' => 'Geeno',
                'email' => 'riccardo@gmail.com',
                'language' => 'romanaccio',
                "password" => Hash::make('12345678'),
                'summary' => 'Sono Riccardo insegnante blastante',
                'img_url' => 'https://avatars.githubusercontent.com/u/3359943?v=4',
                'price' => 999999,
                'is_available' => true
            ];

        User::create($riccardoData);
    }
}
