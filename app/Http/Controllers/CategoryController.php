<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;

class CategoryController extends Controller
{
    use ApiResponseHelpers;

    public function index()
    {
        $categories = Category::withCount(['posts'])->has('posts','>',0)->whereActive(1)->get();
        return $this->respondWithSuccess($categories);
    }
}
