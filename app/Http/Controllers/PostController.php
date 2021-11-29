<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResources;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // return PostResources::collection(Post::all());
        return response()->json([PostResources::collection(Post::all()), Response::HTTP_OK]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return PostResources
     */
    public function store(Request $request)
    {
        $post = Post::create($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));
        return new PostResources($post);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return PostResources
     */
    public function show(Post $post)
    {
        return new PostResources($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));
        return new PostResources($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([null, Response::HTTP_NO_CONTENT]);
    }
}
