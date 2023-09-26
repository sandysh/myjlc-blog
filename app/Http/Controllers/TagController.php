<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;

class TagController extends Controller
{
    use ApiResponseHelpers;

    public function getPostTags()
    {
        return $this->respondWithSuccess(Post::withAllTags()->get());
    }
}
