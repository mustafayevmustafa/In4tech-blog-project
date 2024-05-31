<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.pages.blogs.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        $categories = Category::get();
        $sliders = Slider::get();
        return view('admin.pages.blogs.create', ['categories' => $categories, 'sliders' => $sliders]);
    }

    public function store(BlogStoreRequest $request)
    {

        $name = 'blog' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path() . '/blog/', $name);
        $vali = array_merge($request->validated(), ['image' => $name]);

        Blog::create($vali);
        return redirect('/admin/blogs');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/admin/blogs');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::get();
        $sliders = Slider::get();
        return view('admin.pages.blogs.edit', ['categories' => $categories, 'sliders' => $sliders, 'blog' => $blog]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog->update($data);
        return redirect('/admin/blogs');
    }
}
