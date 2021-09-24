<?php

namespace App\Http\Controllers\Backend;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(): View
    {
        event(new MyEvent());

        if (Cache::exists('posts')) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::with('user')->paginate(10);
            Cache::put('posts', $posts, 3600);
        }

        return view('backend.post.index', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        return \Http::post('http://post.ms/create', $request->all());
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
        $user = auth()->user();
        $tickets = null;

        $tickets = \Http::pool(function (Pool $pool) use ($user, $tickets) {
            return [
                $pool->get('tickets', $user), // 100ms
                $pool->get('invoices', $user), // 200ms
            ];
        });

        dd($tickets[0]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }
}
