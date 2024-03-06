<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThreadsSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Thread::factory()->create([
            'title' => 'Free time',
            'tags' => "[\"Games\", \"PC\"]",
            'images' => "[]",
            'text' => fake()->text,
            'likes' => "[1,2]",
            'dislikes' => "[]",
            'author' => 1,
            'comments' => "[1,2]",
            'closed' => 0,
            'blocked' => 0
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'University',
            'tags' => "[\"Study\"]",
            'images' => "[]",
            'text' => fake()->text,
            'likes' => "[]",
            'dislikes' => "[1]",
            'author' => 2,
            'comments' => "[3]",
            'closed' => 1,
            'blocked' => 0
        ]);
    }
}
