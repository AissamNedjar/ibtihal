<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'Ibitihal Bouauni',
            'email' => 'ibtihal@gmail.com',
            'phone' => '0669391836',
            'password' => bcrypt('01020304'),
        ]);
    }
}
