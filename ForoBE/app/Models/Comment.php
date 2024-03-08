<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['likes'] = $this->attributes['likes'] ?? '[]';
        $this->attributes['dislikes'] = $this->attributes['dislikes'] ?? '[]';
    }
}
