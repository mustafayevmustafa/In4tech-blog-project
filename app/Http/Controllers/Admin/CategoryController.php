<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.pages.categories.create');
    }

    public function store(CategoryStoreRequest $request){
        $data = $request->validated();
        Category::create($data);

        return redirect()->route('admin.category.index');
    }

    public function delete(Request $request){
         $id = $request->id;
//        Category::where('id',$id)->delete();
         Category::find($id)->delete();
        return redirect()->route('admin.category.index');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.pages.categories.edit',compact('category'));
    }
    public function update(CategoryUpdateRequest $request){
        $data = $request->validated();
        $category = new Category();
        $category->title = $data['title'];
        $category->save();
        return redirect()->route('admin.category.index');
    }
}
