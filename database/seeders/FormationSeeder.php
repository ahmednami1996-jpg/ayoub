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
                'title' => "dedwed",
                'category_id' => 1,
                'provider' => "prov",
                'mode' => 1,
                'url' => "x.com",
                'cost' => 98.7,
                'like' => 89,
                'picture' => "no-image.png",
                'reduction' => 4000,
                'rate' => 3.5,
                'duration' => 4 . ' months',
                'views' => 30000,
                'status' => 1,
            ]);
        }
    }
}