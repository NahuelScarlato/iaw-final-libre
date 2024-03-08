<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($threads);
    }

    public function store(Request $request)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->tags = $request->tags;
        $thread->text = $request->text;
        $thread->images = $request->images;
        $thread->author = $request->author;

        $thread->save();
    }

    public function show(string $id)
    {
        $thread = Thread::find($id);
        $comments = Comment::query()
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $thread->comments)
            ->get();
        $thread->comments = $comments;

        return response()->json($thread);
    }

    public function update(Request $request, string $id)
    {
        $thread = Thread::findOrFail($id);
        $thread->comments = json_encode($request->comments);
        $thread->closed = $request->closed;
        $thread->save();

        return $thread;
    }
}
