<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;

class CategoryController extends Controller
{
    use ApiResponseHelpers;

    public function index()
    {
        $categories = Category::whereActive(1)->get();
        return $this->respondWithSuccess($categories);
    }
}
