<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            ['value' => 1, 'lable' => 'Pessimo'],
            ['value' => 2, 'lable' => 'Scarso'],
            ['value' => 3, 'lable' => 'Sufficiente'],
            ['value' => 4, 'lable' => 'Buono'],
            ['value' => 5, 'lable' => 'Eccellente'],
        ];

        foreach ($votes as $vote) {
            Vote::create($vote);
        }
    }
}

