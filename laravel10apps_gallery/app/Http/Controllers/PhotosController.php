<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('photos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
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
            'photo' => 'required|image|max:1999',
        ]);

        $album_id = $request->input('album_id');

        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->album_id = $album_id;
        $photo->photo = '';
        $photo->size = '';

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filenameWithExtension = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $file->storeAs('public/photos', $filenameToStore);

            $photo->photo = $filenameToStore;
            $photo->size = $file->getClientSize();

        }

        $photo->save();

        return redirect(route('albums.show', $album_id))->with('success', 'Photo uploaded success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);

        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('photos.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if(Storage::delete('public/photos/' . $photo->photo)){
            $photo->delete();
        }

        return redirect()->back();
    }
}
