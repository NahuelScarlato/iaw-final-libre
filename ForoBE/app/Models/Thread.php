<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
