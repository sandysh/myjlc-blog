<?php
/**
 * Blog Related Routes
 */

use App\Models\Post;

Route::get('', function() {
    return view('post.index');
})->name('blog.index');

Route::get('/{post:slug}', function(Post $post){
    $post->load('tags');
    return view('post.show',compact('post'));
})->name('post.show');