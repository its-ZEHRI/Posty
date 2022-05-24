<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(){
        // $posts = Post::orderBy('id','desc')->paginate(5);
        // $posts = Post::with(['user','likes'])->orderBy('id','desc')->paginate(5);
        $posts = Post::latest()->with(['user','likes'])->paginate(5);

        // $posts = Post::where('user_id', Auth::User()->id)->get();
        // return view('posts')->with('posts', $posts);
        return view('posts',[
            'posts' => $posts
        ]);
    }

    public function createPost(Request $request){
        // dd($request->toArray());

        // Post::create([
        //     'body' => $request->body,
        //     'user_id' => Auth::User()->id,
        // ]);

        $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return redirect('posts')->with('response', 'Post Created Successfully...');
    }

    public function deletePost(Post $post){
        // if(!$post->ownedBy(auth()->user()))
            // dd('no');

        $this->authorize('delete');
        $post->delete();
        return back()->with('invalid_response','Post Deleted ....');
    }

    public function show(Post $post){
        return view('users.posts.show',[
            'posts' => $post
        ]);
    }
}
