<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $datas = [];

        for ($i=0; $i < 10; $i++) {
            $datas[] = [
                'name' => $faker->name(),
                'description' => $faker->paragraph()
            ];
        }

        foreach ($datas as $data) {
            Review::create($data);
        }
    }
}