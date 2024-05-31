<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogStoreRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        return view('Admin.pages.blogs.index', compact('blogs'));
    }

    public function create(){
        $categories = Category::get();
        return view('Admin.pages.blogs.create', compact('categories'));
    }

    public function store(BlogStoreRequest $request){
        $name = 'blog' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path() . '/img/blog/', $name);
        $vali = array_merge($request->validated(), ['image' => $name]);

        Blog::create($vali);
        return redirect()->route('Admin.blog.index');
    }

    public function delete(Request $request){
        $id = $request->id;
        //Category::where('id',$id)->delete();
        Blog::find($id)->delete();
        return redirect()->route('Admin.blog.index');
    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('Admin.pages.blogs.edit', compact('blog', 'id'));
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $data = $request->validated();
        Blog::where('id', $id)->update($data);
        return redirect()->route('Admin.blog.index');
    }
}
