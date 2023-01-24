<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function getAllPosts()
    {
        $posts = Post::latest()->get();
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'desc' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return response()->json(['code' => 200, 'message' => 'Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       //return new PostResource($post);
       return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return response()->json(['code' => 200, 'message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['code' => 200, 'message' => 'Deleted']);
    }

    public function country()
    {
        return view('country');
    }

    public function getCountries()
    {
        $data = Country::get();
        return response()->json($data);
    }
    /**
     * Retrieve states data
     *
     */
    public function getStates(Request $request)
    {
        $data = State::where('country_id', $request->country_id)->get();
        return response()->json($data);
    }
}
