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
            'tags' => json_decode("[\"Games\", \"PC\"]",true),
            'images' => json_decode("[]",true),
            'text' => fake()->text . fake()->text  . fake()->text,
            'likes' => json_decode("[1,2]", true),
            'dislikes' => json_decode("[]",true),
            'author' => 1,
            'comments' => json_decode("[1,2]",true),
            'closed' => 0
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'University',
            'tags' => json_decode("[\"Study\"]",true),
            'images' => json_decode("[]",true),
            'text' => fake()->text . fake()->text . "\n" . fake()->text,
            'likes' => json_decode("[]",true),
            'dislikes' => json_decode("[1]", true),
            'author' => 2,
            'comments' => json_decode("[3]",true),
            'closed' => 1
        ]);
    }
}
