<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'edit']);
Route::post('user', [UserController::class, 'store']);
Route::delete('user/{id}', [UserController::class, 'delete']);
Route::put('user/{id}', [UserController::class, 'update']);
