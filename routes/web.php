<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MustafaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/index',[IndexController::class,'index'])->name('admin.index');

Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category.index');
Route::get('admin/category/create',[CategoryController::class,'create'])->name('admin.category.create');
Route::post('admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');
Route::post('admin/category/delete',[CategoryController::class,'delete'])->name('admin.categories.delete');
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.categories.edit');
Route::post('admin/category/update',[CategoryController::class,'update'])->name('admin.categories.update');

Route::get('admin/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog.index');
Route::get('admin/blog/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');
Route::post('admin/blog/store', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.store');
Route::post('admin/blog/delete', [\App\Http\Controllers\Admin\BlogController::class, 'delete'])->name('admin.blog.delete');
Route::get('admin/blog/edit/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
Route::post('admin/blog/update/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');

Route::get('/', function(){
    return view('user.pages.home');
});
Route::resource('admin/sliders', SliderController::class);

//front
