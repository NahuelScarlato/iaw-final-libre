<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Comment::factory()->create([
            'text' => 'CS 2 is the best!',
            'tags' => "[\"CS2\"]",
            'images' => "[]",
            'likes' => "[]",
            'dislikes' => "[]",
            'author' => 2
        ]);

        \App\Models\Comment::factory()->create([
            'text' => 'Nah, I like LOL more',
            'tags' => "[\"LOL\"]",
            'images' => "[]",
            'likes' => "[]",
            'dislikes' => "[]",
            'author' => 3
        ]);

        \App\Models\Comment::factory()->create([
            'text' => 'UNS rules',
            'tags' => "[\"UNS\"]",
            'images' => "[]",
            'likes' => "[]",
            'dislikes' => "[]",
            'author' => 3
        ]);
    }
}
