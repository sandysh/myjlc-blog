<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = $request->file('comp_image')->store('testimonials','public');
        $request['company_image'] = $brand;
        $request->has('active') ? $request['active'] = 1 : $request->active = 0;
        Testimonial::create($request->all());
        return redirect()->route('testimonials.index')->with('success','Testimonial added !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Testimonial $testimonial, Request $request)
    {
        if ($request->has('comp_image')) {
            Storage::disk('public')->delete($testimonial->company_image);
            $name = Str::slug($request->name,'-');
            $extension = $request->file('comp_image')->getClientOriginalExtension();
            $fileName = $name.'.'.$extension;
            $path = Storage::disk('public')->putFileAs('testimonials/',$request->file('comp_image'), $fileName);
            $request['image'] = $path;
        }

        isset($request->active) && $request->active === 'on'
            ? $request['active'] = 1
            : $request['active'] = 0;

        $testimonial->update($request->all());
        return redirect()->route('testimonials.index')->with('success','Testimonial updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
