<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view reviews', ['only' => ['index']]);
        $this->middleware('permission:add reviews', ['only' => ['create']]);
        $this->middleware('permission:add reviews', ['only' => ['store']]);
        $this->middleware('permission:edit reviews', ['only' => ['edit']]);
        $this->middleware('permission:update reviews', ['only' => ['update']]);
        $this->middleware('permission:delete reviews', ['only' => ['destroy']]);
    }
    public function index()
    {
        $reviews = Review::whereActive(1)->paginate();
        return view('admin.reviews.index',compact('reviews'));
    }

    public function create(Request $request)
    {
        $courses = Course::whereActive(1)->get();
        return view('admin.reviews.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        Review::create($request->all());
        return redirect()->route('reviews.index')->with('success','Review added');
    }

    public function edit(Review $review, Request $request)
    {
        $courses = Course::whereActive(1)->get();
        return view('admin.reviews.edit',compact('review','courses'));
    }

    public function update(Review $review, Request $request)
    {
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        $review->update($request->all());
        return redirect()->route('reviews.index')->with('success','Review updated');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success','Review deleted');
    }
}
