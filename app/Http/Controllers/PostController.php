<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $data = [
           'posts' => Post::all()
       ];
       return view('guest.posts.index', $data);
    }

    public function show(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        return view('guest.posts.show', ['post' => $post]);
    }
}
