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
  $categories = [
            'Technologie',
            'Santé',
            'Éducation',
            'Énergie',
            'Environnement',
            'Agriculture',
            'Alimentation & Boissons',
            'Mode & Textile',
            'Art & Culture',
            'Média & Divertissement',
            'Tourisme & Hôtellerie',
            'Immobilier',
            'Transport & Mobilité',
            'Sport & Fitness',
            'Finance & Banque',
            'Marketing & Publicité',
            'Commerce Électronique',
            'Applications & Logiciels',
            'Intelligence Artificielle',
            'Robotique',
            'Biotechnologie',
            'Social & Communautaire',
            'Événementiel',
            'Artisanat & Création',
            'Design & Architecture',
            'Jeux & Ludique',
            'Services aux entreprises',
            'Énergies renouvelables',
            'Transport durable',
            'Recherche & Développement',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}