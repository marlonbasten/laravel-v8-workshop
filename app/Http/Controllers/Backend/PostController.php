<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View
    {
        return view('backend.post.index');
    }

    public function create(): View
    {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post): View
    {
        return view('backend.post.show');
    }

    public function edit(Post $post): View
    {
        return view('backend.post.edit');
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
