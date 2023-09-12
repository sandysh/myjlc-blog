<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use F9Web\ApiResponseHelpers;

class PostController extends Controller
{
    use ApiResponseHelpers;
    
    public function index()
    {
        return view('admin.posts.index');
    }

    public function all()
    {
        $posts = Post::with('category')
                    ->whereActive(1)
                    ->select('*')
                    ->selectRaw('LEFT(`body`, 100) as `body`')
                    ->selectRaw('LEFT(`title`, 50) as `title`')
                    ->paginate();
        return $this->respondWithSuccess($posts);
    }

    public function create()
    {
        $categories = Category::whereActive(1)->get();
        return view('admin.posts.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $imageName = Str::slug($request->title,'-').'.'.$request->file('feat_image')->getClientOriginalExtension();
        $path = Storage::disk('public')->putFileAs('posts/featured_images',$request->feat_image, $imageName);
        $request['featured_image'] = $path;
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        $request['user_id'] = auth()->id();
        $request['slug'] = Str::slug($request->title,'-');
        Post::create($request->all());
    }
}
