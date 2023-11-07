<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Client;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notices = Notice::whereActive(1)->latest()->limit(14)->get();
        $banner = Banner::whereActive(1)->first();
        $clients = Client::whereActive(1)->get();
        $testimonials = Testimonial::whereActive(1)->get();
        $popularArray = Setting::where('key','popular')->first();
        if ($popularArray) {
            $popularArray =  json_decode($popularArray->value);
        }
        $popularCourses = Course::with('category')->whereIn('id',collect($popularArray)->toArray())
            ->select('*')
            ->selectRaw('LEFT(`overview`, 100) as `overview`')
            ->get();
        return view('welcome', compact('notices','banner','clients','testimonials',
        'popularCourses'));
    }
}
