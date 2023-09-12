<?php

/**
 * Admin related routes
 */

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

 Route::get('dashboard',function(){
    return view('admin.index');
 });

 Route::resource('categories',CategoryController::class);
 Route::resource('posts',PostController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
 Route::get('posts/all',[PostController::class,'all']);