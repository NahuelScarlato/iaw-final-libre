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
            'images' => json_decode("[\"https://res.cloudinary.com/nahuelcloudiaw/image/upload/v1710002851/iaw_foro/rhxqb5wtjshquxlzafnf.png\"]",true),
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
            'images' => json_decode("[\"https://res.cloudinary.com/nahuelcloudiaw/image/upload/v1710002851/iaw_foro/kh0jjpvwgirbxcjqef53.png\",\"https://res.cloudinary.com/nahuelcloudiaw/image/upload/v1710002860/iaw_foro/hxw0d6wnugolvirc8yro.jpg\"]",true),
            'text' => fake()->text . fake()->text . "\n" . fake()->text,
            'likes' => json_decode("[]",true),
            'dislikes' => json_decode("[1]", true),
            'author' => 2,
            'comments' => json_decode("[3]",true),
            'closed' => 0
        ]);

        \App\Models\Thread::factory()->create([
            'title' => 'CLOSED',
            'tags' => json_decode("[\"Vicios\"]",true),
            'images' => json_decode("[]",true),
            'text' => fake()->text . fake()->text . "\n" . fake()->text,
            'likes' => json_decode("[1,2,3]",true),
            'dislikes' => json_decode("[]", true),
            'author' => 2,
            'comments' => json_decode("[]",true),
            'closed' => 1
        ]);
    }
}
