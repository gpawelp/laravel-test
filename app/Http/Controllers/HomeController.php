<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::has('posts')->get();
//        return $users;
        return view('home', compact('users'));
    }
    
    public function posts() 
    {
        $posts = Post::with('users')->get();
        return view('posts', compact('posts'));
    }
    
    public function postsWithTags()
    {
        $posts = Post::with('tag')->get();
        return view('posts_tags', compact('posts'));
    }
}
