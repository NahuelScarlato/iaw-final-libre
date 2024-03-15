<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use OpenApi\Annotations as OA;

class CommentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/comment",
     *     tags={"Comments"},
     *     summary="Create a new comment",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Comment data",
     *         @OA\JsonContent(
     *             required={"text", "author", "threadId"},
     *             @OA\Property(property="text", type="string"),
     *             @OA\Property(property="tags", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="images", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="author", type="string"),
     *             @OA\Property(property="threadId", type="string")
     *         )
     *     ),
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Comment created",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
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
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->tags = $request->tags ?? [];
        $comment->text = $request->text;
        $comment->images = $request->images ?? [];
        $comment->author = $request->author;

        $comment->save();

        try{
            $thread = Thread::find($request->threadId);
        } catch (\Exception) {
            return response()->json(['message' => 'El id no pertenece a un elemento existente'], 404);
        }
        $comments = $thread->comments;
        $comments[] = $comment->id;
        $thread->comments = $comments;
        $thread->save();

        return response()->json(['commentId' => $comment->id]);
    }

    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->likes = $request->likes;
        $comment->dislikes = $request->likes;
        $comment->save();

        return $comment;
    }

    public function adminDelete(string $id): View
    {
        $thread = Thread::query()->whereJsonContains('comments', $id);
        $keyToRemove = array_search($id, $thread->comments);

        if ($keyToRemove !== false) {
            unset($thread->comments[$keyToRemove]);
        }
        $thread->save();

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return view('components.threads.thread', ["thread" => $thread]);
    }

    public function adminStore(Request $request): View
    {
        $comment = new Comment();
        $comment->tags = $request->tags ? explode(',', $request->tags) : [];
        $comment->text = $request->text;
        $comment->images = $request->images ? explode(' ', $request->images) : [];
        $comment->author = Auth::id();

        $comment->save();

        $thread = Thread::find($request->threadId);
        $comments = $thread->comments;
        $comments[] = $comment->id;
        $thread->comments = $comments;
        $thread->save();

        $comments = Comment::query()
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $thread->comments)
            ->get();
        $thread->comments = $comments;

        return view('components.threads.thread', ["thread" => $thread]);
    }
}
