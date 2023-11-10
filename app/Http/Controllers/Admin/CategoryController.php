<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view categories', ['only' => ['index']]);
        $this->middleware('permission:add categories', ['only' => ['create']]);
        $this->middleware('permission:add categories', ['only' => ['store']]);
        $this->middleware('permission:edit categories', ['only' => ['edit']]);
        $this->middleware('permission:update categories', ['only' => ['update']]);
        $this->middleware('permission:delete categories', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $categories = Category::with('parent')->paginate();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $request['slug'] = Str::slug($request->name,'-');
        $request->has('active') ? $request['active'] = 1 : $request['active'] = 0;
        Category::create($request->only('name','parent_id','slug','active'));
        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    public function edit(Category $category, Request $request)
    {
        $categories = Category::all();
        return view('admin.category.edit',compact('category','categories'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $request->has('active') ? $request['active'] = 1 : $request['active'] = 0;
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }
}
