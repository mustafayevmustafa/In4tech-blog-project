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
            return view('front.pages.about.index', compact('slider'));
        } else {
            $defaultSlider = new \stdClass();
            $defaultSlider->title = "Başlıq hissəsi";
            $defaultSlider->content = "Kontent hissəsi..";
            $defaultSlider->image = "sekilyeri.png";
            return view('front.pages.about.index', ['slider' => $defaultSlider]);
        }

    }
}
