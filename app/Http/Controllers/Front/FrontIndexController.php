<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontIndexController extends Controller
{
    public function index(){
        $category = Category::where('title', 'home')->orderBy('created_at', 'desc')->first();
        $slider = Slider::first();
        $otherCategory = null;
        $blogDatas = Blog::get();
        $carbon = Carbon::class;

        if (!$category) {
            $slider = new \stdClass();
            $slider->title = "Başlıq hissəsi";
            $slider->content = "Kontent hissəsi..";
            $slider->image = "sekilyeri.png";
        } elseif (optional($category)->id !== optional($slider)->category_id) {
            $otherCategory = new \stdClass();
            $otherCategory->title = "Başlıq hissəsi";
            $otherCategory->content = "Kontent hissəsi..";
            $otherCategory->image = "sekilyeri.png";
        } else {
            $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
        }

        if(!$otherCategory) {
            return view('front.pages.index', compact('slider', 'blogDatas', 'carbon'));
        } else {
            return view('front.pages.index', ['slider' => $otherCategory, 'blogDatas' => $blogDatas, 'carbon' => $carbon]);
        }

    }

}
