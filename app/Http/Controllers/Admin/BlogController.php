<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Models\Blog;
use App\Models\Category;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.pages.blogs.index', ['blogs' => $blogs]);
    }

    public function show(Blog $blog)
    {
        return view('admin.pages.blogs.show', ['blog' => $blog]);
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.blogs.create', ['categories' => $categories]);
    }

    public function store(BlogStoreRequest $request)
    {
        $valid_blog = $request->validated();

        // image uploaded
        $image_name = STR::random(16) . '.' . $valid_blog['image']->getClientOriginalExtension();
        $image_tmp = $valid_blog['image']->getPathname();
        $blog_path = Paths::filePaths([public_path()], [Paths::filePaths(['uploads'], [Paths::filePaths(['images'], ['blog-titles'])[0]])[0]])[0];
        move_uploaded_file($image_tmp, Paths::filePaths([$blog_path], [$image_name])[0]);

        // image remote name generating 
        $valid_blog['image'] = request()->getSchemeAndHttpHost() . '/uploads/images/blog-titles/' . $image_name;
        // dd($valid_blog);
        Blog::create($valid_blog);
        return redirect('admin/blog');
    }

    public function destroy(Blog $blog)
    {
        File::delete(str_replace(request()->getSchemeAndHttpHost(), public_path(), $blog->image));
        $blog->delete();
        return redirect('admin/blog');
    }
}
