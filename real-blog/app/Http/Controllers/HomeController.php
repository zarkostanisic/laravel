<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Tag;
use App\Post;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();
        $categories_count = Category::count();
        $tags_count = Tag::count();
        $posts_count = Post::count();

        return view('admin.home', compact('users_count', 'categories_count', 'tags_count', 'posts_count'));
    }
}
