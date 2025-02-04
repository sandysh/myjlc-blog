<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $notices = Notice::latest()->take(5)->get();
        $total = [
            'users' => $totalUsers,
            'posts' => $totalPosts,
            'courses' => $totalCourses,
            'categories' => $totalCategories,
        ];
        return view('admin.index',compact('total','notices'));
    }
}
