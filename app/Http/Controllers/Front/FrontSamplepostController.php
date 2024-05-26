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
        $slider = Slider::get();
        if(isset($category) && count($slider) !== 0) {
            $slider = Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first();
        } else {
            $slider = new \stdClass();
            $slider->title = "Başlıq hissəsi";
            $slider->content = "Kontent hissəsi..";
            $slider->image = "sekilyeri.png";
        }
        $carbon = Carbon::class;

        return view('front.pages.samplepost.index', compact('slider', 'carbon'));
    }
}
