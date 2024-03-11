<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CommentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/comments",
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
     *     @OA\Response(response="200", description="Comment created"),
     *     @OA\Response(response="500", description="Internal server error")
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/comments/{id}",
     *     tags={"Comments"},
     *     summary="Update an existing comment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the comment to update",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Updated comment data",
     *         @OA\JsonContent(
     *             required={"likes", "dislikes"},
     *             @OA\Property(property="likes", type="integer"),
     *             @OA\Property(property="dislikes", type="integer")
     *         )
     *     ),
     *     @OA\Response(response="200", description="Comment updated"),
     *     @OA\Response(response="404", description="Comment not found"),
     *     @OA\Response(response="500", description="Internal server error")
     * )
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->likes = $request->likes;
        $comment->dislikes = $request->dislikes;
        $comment->save();

        return $comment;
    }
}
