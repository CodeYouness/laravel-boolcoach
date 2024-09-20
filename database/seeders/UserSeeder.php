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
        $languages = ['italian', 'english', 'spanish', 'german', 'russian', 'corean', 'chinese', 'japanese'];

        for ($i=0; $i < 10; $i++) {
            $data = [
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'nickname' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'language' => $faker->randomElement($languages),
                "password"=> Hash::make($faker->password()),
                'summary'=> $faker->realTextBetween(200, 1000),
                'img_url'=> 'https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcRk8SKKl8TSgTuEjwFILOIsa6qpjJDIygB5HKjjq62nkme7LMLPyoVob1t0cTDV2YWg6FtfhY9WXjLlbug',
                'price'=>$faker->randomFloat(2, 9.99, 24.99),
                'is_available'=>$faker->boolean(100)
            ];
            User::create($data);
        }

        //! DATI CUSTOM PER TESTARE l'APPLICAZIONE
        $customData =
            [
                'name' => 'federico',
                'surname'=>  'toscano',
                'nickname' => 'toscaf',
                'email' => 'federico@gmail.com',
                'language' => 'italian',
                "password"=> Hash::make('12345678'),
                'summary'=> 'sono il coach federico e questo è il sommario di prova',
                // 'img_url'=> 'https://cdn.shopify.com/s/files/1/0533/2089/files/img-url-filter.jpg?v',
                'price'=> 9.99,
                'is_available'=> true
            ];

        $richmarty = [
            'name' => 'riccardo',
            'surname'=>  'martignago',
            'nickname' => 'theking',
            'email' => 'riccardo@gmail.com',
            'language' => 'italian',
            "password"=> Hash::make('12345678'),
            'summary'=> 'sono il coach riccardo, passato a miglior vita per overdose in un orgia gay',
            'img_url'=> 'https://a.pinatafarm.com/2160x1080/2970ab2263/dance-funeral.jpg',
            'price'=> 9.99,
            'is_available'=> true
        ];

            User::create($customData);
            User::create($richmarty);
    }
}