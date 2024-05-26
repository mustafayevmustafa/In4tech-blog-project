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
        $blogDatas = Blog::get();
        $carbon = Carbon::class;
        $slider = Slider::get();
        $haveSlider = false;

        if (!$category) {
            $slider = new \stdClass();
            $slider->title = "Başlıq hissəsi";
            $slider->content = "Kontent hissəsi..";
            $slider->image = "sekilyeri.png";
        } elseif ($category->id!==null && Slider::where('category_id', $category->id)->exists()) {
            $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
            $haveSlider = true;
        }

        if($haveSlider) {
            return view('front.pages.index', compact('slider', 'blogDatas', 'carbon'));
        } else {
            $defaultSlider = new \stdClass();
            $defaultSlider->title = "Başlıq hissəsi";
            $defaultSlider->content = "Kontent hissəsi..";
            $defaultSlider->image = "sekilyeri.png";
            return view('front.pages.index', ['slider' => $defaultSlider, 'blogDatas' => $blogDatas, 'carbon' => $carbon]);
        }
    }
}
