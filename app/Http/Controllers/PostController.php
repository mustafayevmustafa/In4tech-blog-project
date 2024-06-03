<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        $post = Post::with('user')->get();
        dd($post);
        return view('post', compact('post'));
    }

    public function user() {
        $user = User::with('posts')->get();
        $datas = DB::table('users')->where('name', 'Ferid')->first();

        dd($datas);
        return view('post', compact('user'));
    }
}
