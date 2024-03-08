<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */

class ThreadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'tags' => "[\"" . fake()->word . "\"]",
            'text' => fake()->text,
            'images' => "[]",
            'likes' => "[]",
            'dislikes' => "[]",
            'author' => 1,
            'comments' => "[1]",
            'closed' => 0
        ];
    }
}
