<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Image;
use App\Category;
use App\Comments;

use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;



class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::paginate(1);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('image_id')){
            $image_name = time() . $file->getClientOriginalName();

            $file->move('images', $image_name);

            $image = Image::create(['image' => $image_name]);

            $input['image_id'] = $image->id;

        }

        $user->posts()->create($input);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::findBySlug($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('blog.post', compact('post', 'comments'));
    }

    public function showDisqus($id)
    {
        // $post = Post::find($id);
        $post = Post::findBySlug($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('blog.post_disqus', compact('post', 'comments'));
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

        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        $input = $request->all();

        $post = Post::find($id);

        if($file = $request->file('image_id')){
            $image_name = time() . $file->getClientOriginalName();

            $file->move('images', $image_name);

            $image = Image::create(['image' => $image_name]);

            $input['image_id'] = $image->id;
        }

        $post->update($input);

        return redirect(route('admin.posts.index'));
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

        @unlink(public_path() . $post->image->image);

        $post->delete();

         Session::flash('deleted_post', 'Post '. $post->id . ' deleted');

        return redirect(route('admin.posts.index'));
    }
}
