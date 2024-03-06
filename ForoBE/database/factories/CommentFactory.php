<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'text' => fake()->text,
            'tags' => "[\"" . fake()->word . "\"]",
            'images' => "[]",
            'likes' => "[]",
            'dislikes' => "[]",
            'author' => 2
        ];
    }
}
