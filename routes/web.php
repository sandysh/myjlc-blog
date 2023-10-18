<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('categories',[CategoryController::class,'index']);
Route::post('posts/filter',[PostController::class,'filter']);
Route::post('post/{post}/comment',[PostController::class,'storePostComment']);
Route::get('post/{post}/comment',[PostController::class,'getPostComments']);
Route::get('posts/tags',[PostController::class,'getTags']);
Route::get('posts/recent',[PostController::class,'recent']);
Route::get('post/{post}/shared',[PostController::class,'shared']);
Route::get('courses',[\App\Http\Controllers\CourseController::class,'index'])->name('courses.index');
Route::get('courses/{course}',[\App\Http\Controllers\CourseController::class,'show'])->name('courses.show');
