<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Client;
use App\Models\Notice;
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
        $notices = Notice::whereActive(1)->latest()->limit(5)->get();
        $banner = Banner::whereActive(1)->first();
        $clients = Client::whereActive(1)->get();
        return view('welcome', compact('notices','banner','clients'));
    }
}
