<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'title' => 'required',
            'description' => 'required',
            'cover' => 'image|max:1999',
        ]);

        $album = new Album();
        $album->title = $request->input('title');
        $album->description = $request->input('title');
        $album->cover = '';

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $filenameWithExtension = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $file->storeAs('public/covers', $filenameToStore);

            $album->cover = $filenameToStore;
        }

        $album->save();

        return redirect('/')->with('success', 'Album created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);

        return view('albums.edit', compact('album'));
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
            'title' => 'required',
            'description' => 'required',
            'cover' => 'image|max:1999',
        ]);

        $album = Album::find($id);
        $album->title = $request->input('title');
        $album->description = $request->input('title');

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $filenameWithExtension = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $file->storeAs('public/covers', $filenameToStore);

            $album->cover = $filenameToStore;
        }

        $album->save();

        return redirect('/')->with('success', 'Album edited success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
