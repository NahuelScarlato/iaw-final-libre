<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'banned' => 0,
            'role_admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
            'banned' => 0
        ]);

        \App\Models\User::factory()->create([
            'name' => 'banned',
            'email' => 'banned@example.com',
            'password' => Hash::make('12345678'),
            'banned' => 1
        ]);
    }
}
