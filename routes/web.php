<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\MustafaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
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
Route::get('/',[HomeController::class,'index']);
Route::get('/blogs/{blog}',[HomeController::class,'blogDetail']);

Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/blogs', BlogController::class);
Route::resource('admin/sliders', SliderController::class);

Route::resource('admin/settings', SettingController::class)->names([
    'index' => 'admin.settings.index',
    'create' => 'admin.settings.create',
    'store' => 'admin.settings.store',
    'show' => 'admin.settings.show',
    'edit' => 'admin.settings.edit',
    'update' => 'admin.settings.update',
    'destroy' => 'admin.settings.destroy',
]);
