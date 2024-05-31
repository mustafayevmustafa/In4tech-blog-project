<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::first();
        $blogs = Blog::with('category')->get();
        //        dd($blogs->category);
        //        dd($blogs);
        return view('user.pages.home', compact(['slider', 'blogs']));
    }

    public function blogDetail(Blog $blog)
    {
        return view('user.pages.blogDetail', compact(['blog']));
    }

    public function contact()
    {
        $slider = Slider::first();
        return view('user.pages.contact', compact(['slider']));
    }

    public function contact_send_message(ContactMessageRequest $request)
    {
        $valid_contact = $request->validated();

        Contact::create($valid_contact);
        return redirect('/contact');
    }
}
