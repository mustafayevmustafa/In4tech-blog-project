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
        return redirect('admin/categories');
    }

    public function delete(Request $request){
         $id = $request->id;
         Category::find($id)->delete();
         return redirect('admin/categories');
        }
    public function edit(Category $category){
      
        return view('admin.pages.categories.edit',compact('category'));
    }
    public function update(CategoryUpdateRequest $request, Category $category){
        
        $data = $request->validated();
        $category -> update($data);
        return redirect('/admin/categories');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect('/admin/categories');
     }
}
