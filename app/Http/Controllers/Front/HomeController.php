<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::first();
        $blogs = Blog::with('category')->get();
//        dd($blogs->category);
//        dd($blogs);
        return view('user.pages.home',compact(['slider','blogs']));
    }

    public function blogDetail(Blog $blog){        
        return view('user.pages.blogDetail',compact(['blog']));
    }
}
