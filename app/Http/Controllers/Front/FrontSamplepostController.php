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
        $carbon = Carbon::class;
        $slider = $category ? Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first() : null;

        if (!$slider) {
            $slider = (object) [
                'title' => "Başlıq hissəsi",
                'content' => "Kontent hissəsi..",
                'image' => "sekilyeri.png"
            ];
        }

        return view('front.pages.samplepost.index', compact('slider', 'carbon'));

    }
}
