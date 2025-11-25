<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Créer un utilisateur
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'firstname' => 'Super',
                'lastname' => 'admin',
                "picture"=>"no-image.png",
                'username' => 'admin',
                'email'=>"admin@admin.com",
                'password' => Hash::make('admin123456'),
            ]
        );

        // Rôles à affecter
        $roles = Role::whereIn('name', ['admin', 'user'])->pluck('id');

        // Attacher plusieurs rôles
        $user->roles()->sync($roles);

    }
}
