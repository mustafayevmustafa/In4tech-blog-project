<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->get();
        return view('post', compact('posts'));
    }

    public function user() {
        $users = User::with('posts')->get();
        return view('user', compact('users'));
    }
}
