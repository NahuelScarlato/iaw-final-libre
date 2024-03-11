<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Thread",
 *     title="Thread",
 *     description="Thread entity",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Thread Title"),
 *     @OA\Property(property="tags", type="string", example="Tag1, Tag2, Tag3"),
 *     @OA\Property(property="text", type="string", example="Thread Text"),
 *     @OA\Property(property="images", type="array", @OA\Items(type="string"), example={"image1.jpg", "image2.jpg"}),
 *     @OA\Property(property="author", type="string", example="Author Name"),
 *     @OA\Property(property="created_at", type="string", format="datetime"),
 *     @OA\Property(property="updated_at", type="string", format="datetime"),
 * )
 */
class Thread extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'tags',
        'images',
        'text',
        'likes',
        'dislikes',
        'author',
        'comments',
        'closed'
    ];

    protected $casts = [
        'tags' => 'json',
        'images' => 'json',
        'likes' => 'json',
        'dislikes' => 'json',
        'comments' => 'json',
        'closed' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setDefaultValues();
    }

    protected function setDefaultValues()
    {
        $this->attributes['images'] = $this->attributes['images'] ?? '[]';
        $this->attributes['likes'] = $this->attributes['likes'] ?? '[]';
        $this->attributes['dislikes'] = $this->attributes['dislikes'] ?? '[]';
        $this->attributes['comments'] = $this->attributes['comments'] ?? '[]';
    }
}
