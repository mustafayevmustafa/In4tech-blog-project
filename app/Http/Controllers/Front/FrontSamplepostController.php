<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontSamplepostController extends Controller
{
    public function index(){
        $category = Category::where('title', 'samplepost')->orderBy('created_at', 'desc')->first();
        $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
        $carbon = Carbon::class;

        return view('front.pages.samplepost.index', compact('slider', 'carbon'));
    }
}
