<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 20 tags
        for ($i = 1; $i <= 20; $i++) {
            Tag::create([
                'name' => ucfirst($faker->unique()->word),
            ]);
        }
    }
}