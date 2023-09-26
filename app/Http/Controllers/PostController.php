<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    use ApiResponseHelpers;

    public function filter(Request $request)
    {
        $posts = Post::with('category','user')
                    ->when($request->tag, function(Builder $query) use ($request){
                        $query->withAllTags($request->tag);
                    })
                    ->when($request->category, function(Builder $query) use ($request){
                        $query->where('category_id', $request->category);
                    })
                    ->whereActive(1)
                    ->select('*')
                    ->withCount('comments as comments_count')
                    ->selectRaw('LEFT(`body`, 100) as `body`')
                    ->paginate();
        return $this->respondWithSuccess($posts);
    }

    public function recent()
    {
        $posts = Post::with('category','user')
                    ->whereActive(1)
                    ->select('*')
                    ->selectRaw('LEFT(`title`, 50) as `title`')
                    ->selectRaw('LEFT(`body`, 1) as `body`')
                    ->latest()
                    ->take(5)
                    ->get();
        return $this->respondWithSuccess($posts);
    }

    public function storePostComment(Post $post, Request $request)
    {
        $request['post_id'] = $post->id;
        if (auth()->check()){
            $request['user_id'] = auth()->id();
        }
        Comment::create($request->all());
        return $this->respondWithSuccess();
    }

    public function getPostComments(Post $post)
    {
        $comments = Comment::with('user')->where('post_id',$post->id)->latest()->get();
        return $this->respondWithSuccess($comments);
    }

    public function getTags()
    {
        return $this->respondWithSuccess(Tag::all()->pluck('name'));
    }

    public function shared(Post $post)
    {
        $post->update(['shared' => $post->shared + 1]);
    }
}
