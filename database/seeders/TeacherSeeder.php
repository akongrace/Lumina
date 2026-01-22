<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'teacher@lumina.com'],
            [
                'name' => 'Teacher Account',
                'password' => Hash::make('Teacher123!'),
                'role' => 'Teacher',
            ]
        );

        User::updateOrCreate(
            ['email' => 'teacher2@lumina.com'],
            [
                'name' => 'Teacher 2',
                'password' => Hash::make('Teacher123!'),
                'role' => 'Teacher',
            ]
        );
    }
}