<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LivePostController extends Controller
{
    public function index()
    {
        return view('live_posts.index');
    }

    public function create()
    {
        return view('live_posts.create');
    }

    public function edit(Post $post)
    {
        return view('live_posts.edit', compact('post'));
    }
}
