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
        $slider = $category ? Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first() : null;

        if (!$slider) {
            $slider = (object) [
                'title' => "Başlıq hissəsi",
                'content' => "Kontent hissəsi..",
                'image' => "sekilyeri.png"
            ];
        }

        return view('Front.pages.about.index', compact('slider'));


    }
}
