<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use F9Web\ApiResponseHelpers;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    use ApiResponseHelpers;

    public function index()
    {
        $posts = Post::with('category')
        ->whereActive(1)
        ->select('*')
        ->selectRaw('LEFT(`body`, 100) as `body`')
        ->selectRaw('LEFT(`title`, 50) as `title`')
        ->paginate();
        return view('admin.posts.index',compact('posts'));
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
        $post = Post::create($request->all());
        $post->attachTags(explode(',',$request->tags));
        return redirect()->route('posts.index')->with('success','Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::whereActive(1)->get();
        return view('admin.posts.edit',compact('post','categories'));
    }

    public function update(Post $post, Request $request)
    {
        if ($request->has('feat_image')) {
            $imageName = Str::slug($request->title,'-').'.'.$request->file('feat_image')->getClientOriginalExtension();
            Storage::disk('public')->delete($post->featured_image);
            $path = Storage::disk('public')->putFileAs('posts/featured_images',$request->feat_image, $imageName);
            $request['featured_image'] = $path;
        }
        $request->active ? $request['active'] = 1 : $request['active'] = 0;
        $post->update($request->all());
        $post->syncTags(explode(',',$request->tags));
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if (Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }

    public function tags()
    {
        $tags = Tag::all();
        return $this->respondWithSuccess($tags);
    }
}
