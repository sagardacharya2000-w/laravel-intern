<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin Account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234567890'),
            'role' => 'admin',
        ]);

        // 2. Teacher Account
        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('1234567890'),
            'role' => 'teacher',
        ]);

        // 3. Student Account
        User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('1234567890'),
            'role' => 'student',
        ]);
    }
}
