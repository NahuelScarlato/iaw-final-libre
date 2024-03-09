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
            'tags' => json_decode("[\"CS2\"]", true),
            'images' => json_decode("[]", true),
            'likes' => json_decode("[]", true),
            'dislikes' => json_decode("[]", true),
            'author' => 2
        ]);

        \App\Models\Comment::factory()->create([
            'text' => 'Nah, I like LOL more',
            'tags' => json_decode("[\"LOL\"]", true),
            'images' => json_decode("[\"https://res.cloudinary.com/nahuelcloudiaw/image/upload/v1710003078/iaw_foro/edadtsdzoe6lljawrnab.jpg\"]", true),
            'likes' => json_decode("[]", true),
            'dislikes' => json_decode("[]", true),
            'author' => 3
        ]);

        \App\Models\Comment::factory()->create([
            'text' => 'UNS rules',
            'tags' => json_decode("[\"UNS\"]", true),
            'images' => json_decode("[]", true),
            'likes' => json_decode("[]", true),
            'dislikes' => json_decode("[]", true),
            'author' => 3
        ]);
    }
}
