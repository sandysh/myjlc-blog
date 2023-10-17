<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('creator','category')->paginate();
        return view('admin.courses.index',compact('courses'));
    }

    public function create()
    {
        $categories = Category::whereActive(1)->get();
        return view('admin.courses.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        $course->attachTags(explode(',',$request->tags));
        return redirect()->route('courses.index')->with('success','Course created successfully !!!');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit',compact('course'));
    }

    public function update(Course $course, Request $request)
    {
        $course->update($request->all());
        if ($request->tags && !empty($request->tags)){
            $course->syncTags(explode(',',$request->tags));
        }
        return redirect()->route('courses.index')->with('success','Course updated successfully !!!');
    }

    public function createCurriculum(Course $course)
    {
        $course->load('curriculums');
        return view('admin.curriculum.create', compact('course'));
    }

    public function storeCurriculum(Course $course, Request $request)
    {
        $course->curriculums()->create($request->all());
        return redirect()->route('courses.curriculum.create',$course->id)->with('success','Curriculum created successfully !!!');
    }

    public function editCurriculum(Course $course, Curriculum $curriculum)
    {
        return view('admin.curriculum.edit',compact('course','curriculum'));
    }
    public function updateCurriculum(
        Course $course,
        Curriculum $curriculum,
        Request $request)
    {
        return $request->all();
    }
}
