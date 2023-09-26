<?php

/**
 * Admin related routes
 */

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

 Route::get('dashboard',function(){
    return view('admin.index');
 })->name('dashboard');

 Route::resource('categories',CategoryController::class);
 Route::resource('posts',PostController::class)->only(['index', 'store', 'edit', 'update', 'destroy','create']);
 Route::get('posts/all',[PostController::class,'all']);
 Route::get('tags',[PostController::class,'tags']);