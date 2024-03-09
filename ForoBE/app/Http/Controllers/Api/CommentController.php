<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->tags = $request->tags;
        $comment->text = $request->text;
        $comment->images = $request->images;
        $comment->author = $request->author;

        $comment->save();

        $thread = Thread::find($request->threadId);
        $comments = $thread->comments;
        $comments[] = $comment->id;
        $thread->comments = $comments;
        $thread->save();
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
