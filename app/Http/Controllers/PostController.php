<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(): JsonResponse {
        return response()->json(PostResource::collection(Post::all()));
    }

    public function test(Request $request, $id): JsonResponse
    {
        $post = Post::find($id)
            ->toArray();
        return response()->json(['data'=>$post]);
    }

    public function show(Post $post): JsonResponse {
        return response()->json(new PostResource($post));
    }

    public function store(StorePostRequest $request): JsonResponse {
        Post::create($request->validated());
        return response()->json("Post Created");
    }

    public function update(StorePostRequest $request, Post $post): JsonResponse {
        $post->update($request->validated());
        return response()->json("Post Updated");
    }

    public function destroy(Post $post): JsonResponse {
        $post->delete();
        return response()->json("Post deleted");
    }
}
