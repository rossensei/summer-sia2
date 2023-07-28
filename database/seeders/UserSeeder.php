<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password123'),
            ],   
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('password123'),
            ]
            
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
