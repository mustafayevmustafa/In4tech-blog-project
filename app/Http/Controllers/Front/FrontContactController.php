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
        $slider = $category ? Slider::where('category_id', $category->id)->orderBy('created_at', 'desc')->first() : null;

        if (!$slider) {
            $slider = (object) [
                'title' => "Başlıq hissəsi",
                'content' => "Kontent hissəsi..",
                'image' => "sekilyeri.png"
            ];
        }

        return view('front.pages.contact.index', compact('slider'));
    }

    public function store(ContactStoreRequest $request){
        $data = $request->validated();
        Message::create($data);

        return redirect()->route('contact.store');
    }
}
