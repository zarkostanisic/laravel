<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0){
            return redirect()->back()->with('info', 'You must have some categories before you add post!');
        }

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'featured' => $featured_new_name
        ]);

        $post->tags()->attach($request->tags);

        return  redirect()->route('posts.index')->with('success', 'Post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id); 
        $post_tags = $post->tags->pluck('id')->all();       
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'post_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            // 'featured' => 'required|image',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();

            if($featured->move('uploads/posts', $featured_new_name)){
                $post->featured = $featured_new_name;
            }

        }

        $post->save();

        $post->tags()->sync($request->tags);

        return  redirect()->route('posts.index')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post has been deleted!');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }

    public function remove($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        return redirect()->back()->with('success', 'Post has been removed.');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        return redirect()->back()->with('success', 'Post has been restored.');
    }


}
