<?php
/**
 * Blog Related Routes
 */

Route::get('', function() {
    return view('blog.index');
});