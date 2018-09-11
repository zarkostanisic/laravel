<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Request*/CreatePostRequest $request)
    {
        //insert with upload image
        $input = $request->all();

        if($image = $request->file('image')){
            $image_name = $image->getClientOriginalName();
            //$image_size = $image->getClientSize();

            $image->move('images', $image_name);

            $input['path'] = $image_name;
        }

        Post::create($input);

        //insert without upload image
        // $this->validate($request, [
        //     'title' => 'required|min:5',
        //     'body' => 'required'
        // ]);
        
        //return $request->all();
        //return $request->get('title');

        //return $request->title;

        //Post::create($request->all());

        // $input = [];
        // $input['title'] = $request->title;
        // $input['body'] = $request->body;

        // Post::create($input);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->body = $request->body;

        // $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
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

        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();

        return redirect('/posts');
    }

    public function contact() {
        $people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];
        //$people = [];

        return view('contact', compact('people'));
    }

    public function showPost($id, $name) {
        //return view('post')->with('id', $id);

        return view('post', compact('id', 'name'));
    }
}
