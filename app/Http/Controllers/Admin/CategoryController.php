<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('Admin.pages.categories.index', compact('categories'));
    }

    public function create(){
        return view('Admin.pages.categories.create');
    }

    public function store(CategoryStoreRequest $request){
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('Admin.category.index');
    }

    public function delete(Request $request){
         $id = $request->id;
//        Category::where('id',$id)->delete();
         Category::find($id)->delete();
        return redirect()->route('Admin.category.index');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('Admin.pages.categories.edit',compact('category'));
    }
    public function update(CategoryUpdateRequest $request, $id){
        $data = $request->validated();
        Category::where('id', $id)->update($data);
        return redirect()->route('Admin.category.index');
    }
}
