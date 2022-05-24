<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::all();

        // dd(Auth::User()->posts->toArray());
        return view('dashboard',[
            'posts' => $posts
        ]);
    }
}
