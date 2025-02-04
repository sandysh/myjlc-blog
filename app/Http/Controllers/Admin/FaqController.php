<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Course $course)
    {
        $faqs = $course->faqs()->select('*')->selectRaw('LEFT(`body`, 100) as `body`')->paginate();
        return view('admin.faqs.index',compact('faqs','course'));
    }

    public function create(Course $course)
    {
        $courses = Course::whereActive(1)->get();
        return view('admin.faqs.create',compact('courses','course'));
    }

    public function store(Course $course, Request $request)
    {
        $course->faqs()->create($request->all());
        return redirect()->route('courses.faqs.index',[$course->id])->with('success','faq added !!!');
    }

    public function edit(Course $course, Faq $faq)
    {
        return view('admin.faqs.edit',compact('course','faq'));
    }

    public function update(Course $course, Faq $faq, Request $request)
    {
        isset($request->active) ? $request['active'] = 1 : $request['active'] = 0;
        $faq->update($request->all());
        return redirect()->route('courses.faqs.index',[$course->id])->with('success','faq updated !!!');
    }

    public function destroy(Course $course, Faq $faq)
    {
        $faq->delete();
        return redirect()->route('courses.faqs.index')->with('success','faq deleted !!!');
    }
}
