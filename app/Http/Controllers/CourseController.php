<?php

namespace App\Http\Controllers;

use App\Mail\CourseQuery;
use App\Mail\QueryAutoReply;
use App\Models\Category;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    use ApiResponseHelpers;
    public function index()
    {
        $categories = Category::withCount('courses')->has('courses','>',0)->whereActive(1)->get(['name','id','slug']);
        $courses = Course::with('category')->whereActive(1)->select('*')
            ->selectRaw('LEFT(`overview`, 10) as `overview`')->get();
        return view('courses.index',compact('categories','courses'));
    }

    public function filter(Request $request)
    {
        $posts = Course::with('category')
            ->when($request->tag, function(Builder $query) use ($request){
                $query->withAllTags($request->tag);
            })
            ->when($request->category, function(Builder $query) use ($request){
                $query->where('category_id', $request->category);
            })
            ->whereActive(1)
            ->select('*')
            ->selectRaw('LEFT(`overview`, 10) as `overview`')
            ->paginate(1);
        return $this->respondWithSuccess($posts);
    }

    public function show($course)
    {
        $course = Course::with('category','curriculums','activeFaqs','reviews')->whereSlug($course)->first();
        return view('courses.show',compact('course'));
    }

    public function coursesCategories()
    {
        $categories = Category::withCount(['courses'])->has('courses','>',0)->whereActive(1)->get();
        $total_courses = Course::whereActive(1)->count();
        return $this->respondWithSuccess(['categories'=>$categories,'total_courses'=>$total_courses]);
    }

    public function postReview(Course $course, Request $request)
    {
        $request['user_id'] = auth()->id();
        $request['stars'] = intval($request->stars);
        $course->reviews()->create($request->all());
        return redirect()->back()->with('success','Your review was posted successfully');
    }

    public function postReviewFeedback(Course $course, Review $review, Request $request)
    {
        if ($request->type === 'positive') {
            $review->increment('like');
        } else {
            $review->increment('dislike');
        }
    }

    public function query()
    {
        $recipients = env('MAIL_TO');
        $cc = env('MAIL_TO_CC');
        Mail::to($recipients)
            ->cc($cc)
            ->send(new CourseQuery());
        Mail::to(request('email'))->send(new QueryAutoReply());
        return redirect()->back()->with('success','Your query has been placed. Our team will get back to you shortly');
    }
}
