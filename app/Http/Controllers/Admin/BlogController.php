<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
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
        $blog_path = Paths::filePaths([public_path()], [Paths::filePaths(['uploads'], ['images'])[0]])[0];
        move_uploaded_file($image_tmp, Paths::filePaths([$blog_path], [$image_name])[0]);

        // image remote name generating 
        $valid_blog['image'] = request()->getSchemeAndHttpHost() . '/uploads/images/' . $image_name;
        Blog::create($valid_blog);
        return redirect('admin/blog');
    }

    public function destroy(Blog $blog)
    {
        File::delete(str_replace(request()->getSchemeAndHttpHost(), public_path(), $blog->image));
        $blog->delete();
        return redirect('admin/blog');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::get();
        return view('admin.pages.blogs.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        // dd($request);
        $valid_blog =  $request->validated();

        if ($request['image']) {
            // remove old image 
            $image_path = str_replace(request()->getSchemeAndHttpHost(), public_path(), $blog->image);
            $image_path = str_replace('/', "\\", $image_path);
            if (File::exists($image_path)) File::delete($image_path);

            // upload a new image
            $old_image_name = explode("\\", $image_path);
            $old_image_name = $old_image_name[count($old_image_name) - 1];
            $new_image_name = STR::random(16) . '.' . $valid_blog['image']->getClientOriginalExtension();
            $new_image_path = str_replace($old_image_name, $new_image_name, $image_path);
            move_uploaded_file($request['image']->getPathname(), $new_image_path);

            // Define a new remote image name
            $new_image_path = str_replace(public_path(), request()->getSchemeAndHttpHost(), $new_image_path);
            $new_image_path = str_replace('\\', '/', $new_image_path);
            $valid_blog['image'] = $new_image_path;
        } else
            $valid_blog['image'] = $blog['image'];

        $blog->update($valid_blog);
        return redirect('admin/blog/' . $blog->id);
    }
}
