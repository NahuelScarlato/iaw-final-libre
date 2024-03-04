<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        return Thread::all();
    }

    public function store(Request $request)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->comments = $request->comments;
        $thread->closed = $request->closed;



        $thread->save();
    }

    public function show(string $id)
    {
        return Thread::find($id);
    }

    public function update(Request $request, string $id)
    {
        $thread = Thread::findOrFail($id);
        $thread->title = $request->title;
        $thread->comments = $request->comments;
        $thread->closed = $request->closed;
        $thread->save();

        return $thread;
    }
}
