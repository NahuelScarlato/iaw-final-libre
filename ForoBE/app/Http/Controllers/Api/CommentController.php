<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->tags = $request->tags;
        $comment->text = $request->text;
        $comment->images = $request->images;
        $comment->likes = $request->likes;
        $comment->dislikes = $request->dislikes;
        $comment->author = $request->author;

        $comment->save();
    }

    public function show(string $id)
    {
        return Comment::find($id);
    }

    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->tags = $request->tags;
        $comment->text = $request->text;
        $comment->images = $request->images;
        $comment->likes = $request->likes;
        $comment->dislikes = $request->dislikes;
        $comment->author = $request->author;
        $comment->save();

        return $comment;
    }
}
