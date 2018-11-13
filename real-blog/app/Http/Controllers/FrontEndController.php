<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use App\Post;

class FrontEndController extends Controller
{
    public function index(){
    	$settings = Setting::first();
    	$categories = Category::with(['home_posts'])->limit(5)->get();

    	$latest_posts = Post::with('category')->latest()->limit(3)->get();

    	return view('index', compact('settings', 'categories', 'latest_posts'));
    }
}
