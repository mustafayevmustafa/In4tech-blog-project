<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.pages.blogs.index',compact('blogs'));
    }
    public function create(){
        return view('admin.pages.blogs.create');
    }

    public function store(BlogStoreRequest $request){
        $data = $request->validated();
        Blog::create($data);

        return redirect()->route('admin.blog.index');
    }

    public function delete(Request $request){
        $id = $request->id;
//        Blog::where('id',$id)->delete();
        Blog::find($id)->delete();
        return redirect()->route('admin.blog.index');
    }
    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.pages.blogs.edit',compact('blog', 'id'));
    }
    public function update(BlogUpdateRequest $request, $id){
        $data = $request->validated();

        Blog::where('id',$id)->update($data);

        return redirect()->route('admin.blog.index');
    }
}
