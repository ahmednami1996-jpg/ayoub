<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subvention;
use Illuminate\Support\Str;
class SubventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 30; $i++) {
            Subvention::create([
                'title' => $faker->sentence(3),
                'organization' => $faker->company,
                'country' => $faker->country,
                'city' => $faker->city,
                'file_name' => $faker->word() . '.pdf',
                'eligibilities' => $faker->paragraph,
                'views' => $faker->numberBetween(0, 500),
                'status' => $faker->boolean(80), // 80% chance of true
                'url' => $faker->url,
            ]);
        }
    }
}
