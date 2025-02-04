<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view courses', ['only' => ['index']]);
        $this->middleware('permission:add courses', ['only' => ['create']]);
        $this->middleware('permission:add courses', ['only' => ['store']]);
        $this->middleware('permission:edit courses', ['only' => ['edit']]);
        $this->middleware('permission:update courses', ['only' => ['update']]);
        $this->middleware('permission:delete courses', ['only' => ['destroy']]);
    }
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
        try
        {
            if($request->has('feat_image'))
            {
                $imageName = Str::slug($request->title,'-').'.'.$request->file('feat_image')->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs('courses/featured_images',$request->feat_image, $imageName);
                $request['featured_image'] = $path;
            }
            $course = Course::create($request->all());
            if(isset($request->tags)) $course->attachTags(explode(',',$request->tags));
            return redirect()->route('courses.index')->with('success','Course created successfully !!!');
        } 
        catch(Exception $e)
        {
            return redirect()->route('courses.index')->with('success','Course creation Failed !!!');
        }
        
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit',compact('course'));
    }

    public function update(Course $course, Request $request)
    {
        if ($request->has('feat_image')) {
            $imageName = Str::slug($request->title,'-').'.'.$request->file('feat_image')->getClientOriginalExtension();
            Storage::disk('public')->delete($course->featured_image);
            $path = Storage::disk('public')->putFileAs('posts/featured_images',$request->feat_image, $imageName);
            $request['featured_image'] = $path;
        }
        $course->update($request->all());
        if ($request->tags && !empty($request->tags)){
            $course->syncTags(explode(',',$request->tags));
        }
        return redirect()->route('courses.index')->with('success','Course updated successfully !!!');
    }

    public function destroy(Course $course)
    {
        if (Storage::disk('public')->exists($course->featured_image)) {
            Storage::disk('public')->delete($course->featured_image);
        }
        $course->delete();
        $course->curriculums()->delete();
        return redirect()->route('courses.index')->with('success','Course deleted successfully');
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

    public function deleteCurriculum(Course $course)
    {
        $course->curriculums()->delete();;
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
