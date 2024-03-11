<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\View\View;
use OpenApi\Annotations as OA;

class ThreadController extends Controller
{
    /**
     * @OA\Get(
     *     path="/threads",
     *     tags={"Threads"},
     *     summary="Get all threads",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Thread")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $threads = Thread::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($threads);
    }

    public function adminIndex(): View
    {
        $threads = Thread::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.threads.threads-list', ["threads" => $threads]);
    }

    public function adminCreateThreadForm(): View
    {
        return view('components.threads.create-thread-form');
    }

    /**
     * @OA\Post(
     *     path="/threads",
     *     tags={"Threads"},
     *     summary="Create a new thread",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Thread")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Thread created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Thread")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->tags = $request->tags ?? [];
        $thread->text = $request->text;
        $thread->images = $request->images ?? [];
        $thread->author = $request->author;

        $thread->save();
    }

    /**
     * @OA\Get(
     *     path="/threads/{id}",
     *     tags={"Threads"},
     *     summary="Get a specific thread",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Thread ID",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Thread")
     *     )
     * )
     */
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

    public function adminShow(string $id): View
    {
        $thread = Thread::find($id);
        $comments = Comment::query()
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $thread->comments)
            ->get();
        $thread->comments = $comments;

        return view('components.threads.thread', ["thread" => $thread]);
    }

    /**
     * @OA\Patch(
     *     path="/threads/{id}",
     *     tags={"Threads"},
     *     summary="Update a thread",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Thread ID",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Thread")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Thread updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Thread")
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $thread = Thread::findOrFail($id);
        $thread->comments = json_encode($request->comments);
        $thread->save();

        return $thread;
    }

    public function adminClose(string $id): View
    {
        $thread = Thread::findOrFail($id);
        $thread->closed = true;
        $thread->save();

        return $this->adminIndex();
    }
}
