<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

class AdminMediaController extends Controller
{
    public function index()
    {	
    	$images = Image::all();

    	return view('admin.media.index', compact('images'));
    }

    public function create()
    {
    	return view('admin.media.create');
    }

    public function store(Request $request)
    {
    	$file = $request->file('file');

    	$image_name = time() . $file->getClientOriginalName();

    	$file->move('images', $image_name);

    	Image::create(['image' => $image_name]);
    }

    public function destroy($id)
    {

    	$image = Image::find($id);

    	unlink(public_path() . $image->image);

    	$image->delete();

    	return redirect(route('admin.media.index'));
    }

    public function destroyBulk(Request $request){

        $images = Image::find($request->checkBoxArray);

        if(count($images)){
            foreach($images as $image){
                $image->delete();
            }
        }

        return redirect()->back();
    }
}
