<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactStoreRequest;
use App\Models\Category;
use App\Models\Message;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function index(){
        $category = Category::where('title', 'contact')->orderBy('created_at', 'desc')->first();
        $slider = Slider::first();
        $otherCategory = null;

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
            return view('front.pages.contact.index', compact('slider'));
        } else {
            return view('front.pages.contact.index', ['slider' => $otherCategory]);
        }
    }

    public function store(ContactStoreRequest $request){
        $data = $request->validated();
        Message::create($data);

        return redirect()->route('contact.store');
    }
}
