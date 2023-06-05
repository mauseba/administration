<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mauro Sebastian Barrios',
            'email' => 'maurosebastianb1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Neiva2011') // password
        ]);
        
        
        User::factory(90)->create();
    }
}
