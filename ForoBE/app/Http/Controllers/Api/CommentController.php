<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        $comments->transform(function ($comment) {
            $comment->tags = json_decode($comment->tags);
            $comment->images = json_decode($comment->images);
            $comment->likes = json_decode($comment->likes);
            $comment->dislikes = json_decode($comment->dislikes);
            return $comment;
        });

        return response()->json($comments);
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
