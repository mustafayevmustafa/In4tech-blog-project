<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontAboutController extends Controller
{
    public function index(){
        $category = Category::where('title', 'about')->orderBy('created_at', 'desc')->first();
        $slider = Slider::get();
        if(isset($category) && count($slider) !== 0) {
            $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
        } else {
            $slider = new \stdClass();
            $slider->title = "Başlıq hissəsi";
            $slider->content = "Kontent hissəsi..";
            $slider->image = "sekilyeri.png";
        }

        return view('front.pages.about.index', compact('slider'));
    }
}
