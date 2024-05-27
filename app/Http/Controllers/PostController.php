<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::with('user')->get();
        dd($post);
        return view('post', compact('post'));
    }

    public function user() {
        $user = User::with('posts')->get();
        dd($user);
        return view('post', compact('user'));
    }
}
