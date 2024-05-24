<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function index(){
        $category = Category::where('title', 'contact')->orderBy('created_at', 'desc')->first();
        $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();

        return view('front.pages.contact.index', compact('slider'));
    }
}
