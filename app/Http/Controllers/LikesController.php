<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function likesStore(Post $post , Request $request){
        // dd($post->likedBy($request->user()));
        // like::create($request);
        // dd( $post->toArray());
        if($post->likedBy($request->user()))
            return response(null,409);

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();

    }
    public function unlikePost(Post $post, Request $request){
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
