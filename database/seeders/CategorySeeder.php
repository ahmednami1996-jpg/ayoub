<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $faker = \Faker\Factory::create();

        // Create 10 random categories
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name' => ucfirst($faker->unique()->word),
            ]);
        }
    }
}
