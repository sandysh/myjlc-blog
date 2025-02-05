<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('categories',[CategoryController::class,'index']);
Route::post('posts/filter',[PostController::class,'filter']);
Route::post('post/{post}/comment',[PostController::class,'storePostComment']);
Route::get('post/{post}/comment',[PostController::class,'getPostComments']);
Route::get('posts/tags',[PostController::class,'getTags']);
Route::get('posts/recent',[PostController::class,'recent']);
Route::get('post/{post}/shared',[PostController::class,'shared']);
Route::get('courses',[\App\Http\Controllers\CourseController::class,'index'])->name('web.courses.index');
Route::get('courses/categories',[\App\Http\Controllers\CourseController::class,'coursesCategories'])->name('web.courses.categories');
Route::get('courses/{course}',[\App\Http\Controllers\CourseController::class,'show'])->name('courses.show');
Route::post('courses/filter',[\App\Http\Controllers\CourseController::class,'filter'])->name('courses.filter');
Route::post('courses/{course}/review',[\App\Http\Controllers\CourseController::class,'postReview'])->name('courses.review.post');
Route::post('courses/{course}/review/{review}/feedback',[\App\Http\Controllers\CourseController::class,'postReviewFeedback'])->name('courses.review.post.feedback');
Route::post('post/query',[\App\Http\Controllers\CourseController::class,'query'])->name('post.query');
Route::get('privacy-policy', function (){
   return view('privacy-policy');
})->name('privacy.policy');
Route::get('terms-and-conditions', function (){
   return view('terms-and-conditions');
})->name('terms.conditions');
Route::get('refund-policy', function (){
   return view('refund-policy');
})->name('refund.policy');
