<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use App\Post;
use App\Tag;
use Newsletter;

class FrontEndController extends Controller
{
    public function index(){
    	$settings = Setting::first();
    	$categories = Category::with(['home_posts'])->limit(5)->get();
    	$latest_posts = Post::with('category')->latest()->limit(3)->get();

    	$title = $settings->site_name;

    	return view('index', compact('settings', 'categories', 'latest_posts', 'title'));
    }

    public function single($slug){
    	$settings = Setting::first();
    	$categories = Category::limit(5)->get();
    	$single = Post::where('slug', $slug)->first();
    	$single_prev_id = Post::where('id', '<', $single->id)->max('id');
    	$single_next_id = Post::where('id', '>', $single->id)->min('id');
    	$single_prev = $single_prev_id ? Post::where('id', $single_prev_id)->first() : null;
    	$single_next = $single_next_id ? Post::where('id', $single_next_id)->first() : null;
    	$tags = Tag::all();

    	$title = $settings->site_name . ' | ' . $single->category->name . ' | ' . $single->title;

    	return view('single', compact('settings', 'categories', 'single', 'title', 'single_prev', 'single_next', 'tags'));
    }

    public function category($slug){
    	$settings = Setting::first();
    	$categories = Category::limit(5)->get();
    	$category = Category::where('slug', $slug)->first();
    	$posts = $category->posts()->paginate(1);

    	$title = $settings->site_name . ' | ' . $category->name;
    	$tags = Tag::all();


    	return view('category', compact('settings', 'categories', 'category', 'title', 'posts', 'tags'));
    }

    public function tag($id){
    	$settings = Setting::first();
    	$categories = Category::limit(5)->get();
    	$tag = Tag::find($id);
    	$posts = $tag->posts()->paginate(1);

    	$title = $settings->site_name . ' | ' . $tag->tag;
    	$tags = Tag::all();


    	return view('tag', compact('settings', 'categories', 'tag', 'title', 'posts', 'tags'));
    }

    public function search(Request $request){
    	$query = $request->query('query');
    	$settings = Setting::first();
    	$categories = Category::limit(5)->get();
    	$posts = Post::where('title', 'like', '%'. $query . '%')->paginate(1);

    	$title = $settings->site_name . ' | Search';
    	$tags = Tag::all();


    	return view('search', compact('settings', 'categories', 'query', 'title', 'posts', 'tags'));
    }

    public function subscribe(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $message = 'You are successfully subscribed.';
        
        if(Newsletter::hasMember($request->email)){
            $message = 'You are already subscribed.';
        }

        Newsletter::subscribe($request->email);

        return redirect()->back()->with('success', $message);
    }
}
