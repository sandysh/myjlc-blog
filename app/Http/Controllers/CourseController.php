<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::whereActive(1)->get(['name','id','slug']);
        $courses = Course::with('category')->whereActive(1)->select('*')
            ->selectRaw('LEFT(`overview`, 10) as `overview`')->get();
        return view('courses.index',compact('categories','courses'));
    }

    public function show($course)
    {
        $course = Course::with('category','curriculums')->whereSlug($course)->first();
        return view('courses.show',compact('course'));
    }
}
