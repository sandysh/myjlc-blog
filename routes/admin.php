<?php

/**
 * Admin related routes
 */

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SettingsController;

Route::get('/dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

Route::resource('users',\App\Http\Controllers\Admin\UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'create']);
Route::get('posts/all', [PostController::class, 'all']);
Route::get('tags', [PostController::class, 'tags']);
Route::resource('courses', CourseController::class)->except('show');
Route::get('courses/{course}/curriculum', [CourseController::class, 'createCurriculum'])->name('courses.curriculum.create');
Route::post('courses/{course}/curriculum', [CourseController::class, 'storeCurriculum'])->name('courses.curriculum.store');
Route::get('courses/{course}/curriculum/{curriculum}/edit', [CourseController::class, 'editCurriculum'])->name('courses.curriculum.edit');
Route::put('courses/{course}/curriculum/{curriculum}/update', [CourseController::class, 'updateCurriculum'])->name('courses.curriculum.update');

/* Courses FAQS */
Route::get('courses/{course}/faqs', [FaqController::class, 'index'])->name('courses.faqs.index');
Route::post('courses/{course}/faqs', [FaqController::class, 'store'])->name('courses.faqs.store');
Route::get('courses/{course}/faqs/create', [FaqController::class, 'create'])->name('courses.faqs.create');
Route::get('courses/{course}/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('courses.faqs.edit');
Route::put('courses/{course}/faqs/{faq}/update', [FaqController::class, 'update'])->name('courses.faqs.update');
Route::delete('courses/{course}/faqs/{faq}', [FaqController::class, 'destroy'])->name('courses.faqs.delete');

/* Notices */

Route::resource('notices', NoticeController::class);
/*Banners*/
Route::resource('banners',BannerController::class);

Route::resource('clients',\App\Http\Controllers\Admin\ClientController::class);

Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

Route::get('settings/popular',[SettingsController::class,'popularIndex'])->name('settings.popular.index');
Route::post('settings/popular',[SettingsController::class,'popularStore'])->name('settings.popular.store');

Route::resource('reviews',\App\Http\Controllers\Admin\ReviewController::class);

Route::resource('roles',\App\Http\Controllers\Admin\RoleController::class);
Route::get('roles/{role}/edit/permissions',[\App\Http\Controllers\Admin\RoleController::class,'editPermissions'])
    ->name('roles.permissions.edit');
Route::post('roles/{role}/update/permissions',[\App\Http\Controllers\Admin\RoleController::class,'updatePermissions'])
    ->name('roles.permissions.update');
