<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formation;
use App\Models\Category; // <-- Make sure this is the Model, not a seeder
use Illuminate\Support\Str;

class FormationSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Get all category IDs for assigning to formations
        $categoryIds = Category::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Formation::create([
                'title' => $faker->sentence(3),
                'category_id' => $faker->optional()->randomElement($categoryIds),
                'provider' => $faker->company,
                'mode' => $faker->boolean,
                'url' => $faker->url,
                'cost' => $faker->randomFloat(2, 50, 1000),
                'like' => $faker->numberBetween(0, 500),
                'picture' => "no-image.png",
                'reduction' => $faker->optional()->randomFloat(2, 5, 50),
                'duration' => $faker->optional()->numberBetween(1, 24) . ' months',
                'views' => $faker->numberBetween(0, 1000),
                'status' => $faker->boolean(80),
            ]);
        }
    }
}