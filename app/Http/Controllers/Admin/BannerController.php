<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate();
        return view('admin.banners.index',compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $extension = $request->file('banner_image')->getClientOriginalExtension();
        $name = Str::slug($request->title,'-').'.'.$extension;
        $path = Storage::disk('public')->putFileAs('banners', $request->banner_image, $name);
        $request['image'] = $path;
        isset($request->active) && $request->active === 'on' ? $request['active'] = 1 : $request['active'] = 0;
        Banner::create($request->all());
        return redirect()->route('banners.index')->with('success','Banner created !!!!');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    public function update(Banner $banner, Request $request)
    {
        if ($request->banner_image) {
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $name = Str::slug($request->title,'-').'.'.$extension;
            $path = Storage::disk('public')->putFileAs('banners', $request->banner_image, $name);
            $request['image'] = $path;
        }
        if (isset($request->active) && $request->active === 'on') {
            Banner::where('active',1)->update(['active' => 0]);
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }
        $banner->update($request->all());
        return redirect()->route('banners.index')->with('success','Banner updated !!!!');
    }

    public function destroy(Banner $banner)
    {
        Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return redirect()->route('banners.index')->with('success','Banner deleted !!!');
    }
}
