<?php

use App\Http\Controllers\Admin\{BlogController,
    CategoryController,
    IndexController,
    MessageController,
    SliderController};

use App\Http\Controllers\Front\{
    FrontIndexController,
    FrontAboutController,
    FrontContactController,
    FrontSamplepostController};
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//adminpanel
Route::prefix('admin')->name('Admin.')->middleware('auth.admin')->group(function () {
    Route::get('/index', [IndexController::class,'dashboard'])->name('dashboard');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::get('/create', [CategoryController::class,'create'])->name('create');
        Route::post('/store', [CategoryController::class,'store'])->name('store');
        Route::post('/delete', [CategoryController::class,'delete'])->name('delete');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class,'update'])->name('update');
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::post('/delete', [BlogController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
    });

    Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('/create', [SliderController::class, 'create'])->name('create');
        Route::post('/store', [SliderController::class, 'store'])->name('store');
        Route::post('/delete', [SliderController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('update');
        Route::get('/export', [SliderController::class, 'export'])->name('export');
        Route::post('/import', [SliderController::class, 'import'])->name('import');
    });

    Route::prefix('message')->name('message.')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::post('/delete', [MessageController::class, 'delete'])->name('delete');
        Route::get('/removed', [MessageController::class, 'removedMessages'])->name('removedMessages');
        Route::get('/removed/{id}', [MessageController::class, 'permanentlyDelete'])->name('permanentlyDelete');
    });
});



//Front
Route::get('/', [FrontIndexController::class,'index'])->name('index');
Route::get('/about', [FrontAboutController::class,'index'])->name('about.index');
Route::get('/samplepost', [FrontSamplepostController::class,'index'])->name('samplepost.index');
Route::post('/blog/{id}', [FrontSamplepostController::class,'blog'])->name('blog.index');
Route::get('/contact', [FrontContactController::class,'index'])->name('contact.index');
Route::post('/contact', [FrontContactController::class,'store'])->name('contact.store');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
