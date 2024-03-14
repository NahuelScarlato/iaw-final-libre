<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Comment",
 *     title="Comment",
 *     description="Schema for representing a comment.",
 *     required={"text", "author", "threadId"},
 *     @OA\Property(
 *         property="text",
 *         type="string",
 *         description="The text content of the comment."
 *     ),
 *     @OA\Property(
 *         property="tags",
 *         type="array",
 *         @OA\Items(type="string"),
 *         description="An array of tags associated with the comment."
 *     ),
 *     @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(type="string"),
 *         description="An array of image URLs associated with the comment."
 *     ),
 *     @OA\Property(
 *         property="author",
 *         type="string",
 *         description="The author of the comment."
 *     ),
 *     @OA\Property(
 *         property="threadId",
 *         type="string",
 *         description="The ID of the thread to which the comment belongs."
 *     )
 * )
 */
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'tags',
        'text',
        'images',
        'likes',
        'dislikes',
        'author'
    ];

    protected $casts = [
        'tags' => 'json',
        'images' => 'json',
        'likes' => 'json',
        'dislikes' => 'json',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setDefaultValues();
    }

    protected function setDefaultValues()
    {
        $this->attributes['images'] = $this->attributes['images'] ?? '[]';
        $this->attributes['tags'] = $this->attributes['tags'] ?? '[]';
        $this->attributes['likes'] = $this->attributes['likes'] ?? '[]';
        $this->attributes['dislikes'] = $this->attributes['dislikes'] ?? '[]';
    }
}
