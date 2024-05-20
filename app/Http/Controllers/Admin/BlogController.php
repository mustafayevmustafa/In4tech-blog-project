<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        return view('admin.pages.blogs.index', compact('blogs'));
    }

    public function create(){
        $categories = Category::get();
        return view('admin.pages.blogs.create',compact('categories'));
    }

    public function store(BlogStoreRequest $request){

        $name = 'blog' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path() . '/blog/', $name);
        $vali = array_merge($request->validated(), ['image' => $name]);

        Blog::create($vali);
        return redirect()->route('admin.blog.index');
    }

    public function delete(Request $request){
        $id = $request->id;
        //Category::where('id',$id)->delete();
        Blog::find($id)->delete();
        return redirect()->route('admin.blog.index');
    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.pages.blogs.edit',compact('blog', 'id'));
    }

    public function update(BlogUpdateRequest $request, $id)
    {
        $data = $request->validated();
        Blog::where('id', $id)->update($data);
        return redirect()->route('admin.blog.index');
    }
}
