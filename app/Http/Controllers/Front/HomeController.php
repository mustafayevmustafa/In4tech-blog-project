<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::first();
        $blogs = Blog::get();
        return view('user.pages.home',compact(['slider','blogs']));
    }
}
