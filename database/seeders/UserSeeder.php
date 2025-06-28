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
        // Создаем тестового учителя
        User::factory()->create([
            'first_name' => 'Иван',
            'last_name' => 'Петров',
            'email' => 'user@gmail.com',
            'role' => 'teacher',
            'bio' => 'Преподаватель математики',
            'password' => bcrypt('user@gmail.com'),
        ]);
    }
}
