<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->tags = json_encode($request->tags);
        $comment->text = $request->text;
        $comment->images = json_encode($request->images);;
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
        $comment->likes = $request->likes;
        $comment->dislikes = $request->dislikes;
        $comment->save();

        return $comment;
    }
}
