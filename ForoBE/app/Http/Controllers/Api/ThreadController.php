<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use OpenApi\Annotations as OA;

/**
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     securityScheme="bearerAuth"
 * )
 */

class ThreadController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/threads",
     *     tags={"Threads"},
     *     summary="Get all threads",
     *     security={{"bearerAuth": {}}},
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

    /**
     * @OA\Post(
     *     path="/api/thread",
     *     tags={"Threads"},
     *     summary="Create a new thread",
     *     security={{"bearerAuth": {}}},
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

        return response()->json($thread);
    }

    /**
     * @OA\Get(
     *     path="/api/thread/{id}",
     *     tags={"Threads"},
     *     summary="Get a specific thread",
     *     security={{"bearerAuth": {}}},
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
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Thread id was not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="El id no pertenece a un elemento existente")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        try{
            $thread = Thread::find($id);
        } catch (\Exception) {
            return response()->json(['message' => 'El id no pertenece a un elemento existente'], 404);
        }
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

    public function adminStore(Request $request): View
    {
        $userId = Auth::id();
        $request->merge(["author" => $userId]);
        $request->tags = $request->tags ? explode(',', $request->tags) : [];
        $request->images = $request->images ? explode(' ', $request->images) : [];
        $this->store($request);

        return $this->adminIndex();
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
}
