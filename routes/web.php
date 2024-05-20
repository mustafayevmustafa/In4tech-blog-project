<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\BlogController;
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

Route::get('admin/blog/index',[BlogController::class,'index'])->name('admin.blog.index');
Route::get('admin/blog/create',[BlogController::class,'create'])->name('admin.blog.create');
Route::post('admin/blog/store',[BlogController::class,'store'])->name('admin.blog.store');
Route::post('admin/blog/delete',[BlogController::class,'delete'])->name('admin.blogs.delete');
Route::get('admin/blog/edit/{id}',[BlogController::class,'edit'])->name('admin.blogs.edit');
Route::post('admin/blog/update/{id}',[BlogController::class,'update'])->name('admin.blogs.update');


