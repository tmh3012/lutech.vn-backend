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

    public function show($id): JsonResponse {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function store(StorePostRequest $request): JsonResponse {
        Post::create($request->validated());
        return response()->json("Post Created");
    }

    public function update(StorePostRequest $request, $id): JsonResponse {
        Post::find($id)->update($request->validated());
        return response()->json("Post Updated");
    }

    public function destroy($id): JsonResponse {
        Post::find($id)->delete();
        return response()->json("Post deleted");
    }
}
