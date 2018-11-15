<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Discusion;
use App\Channel;

class DiscusionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discusions = Discusion::with('channel')->paginate(5);

        return view('discusions.index', compact('discusions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();

        return view('discusions.create', compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'channel_id' => 'required',
            'title' => 'required',
            'body' => 'required'

        ]);

        Discusion::create([
            'user_id' => Auth::user()->id,
            'channel_id' => $request->channel_id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'body' => $request->body
        ]);

        return redirect()->route('discusions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discusion = Discusion::where('slug', $slug)->first();

        return view('discusions.show', compact('discusion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discusion = Discusion::find($id);
        $channels = Channel::all();

        return view('discusions.edit', compact('discusion', 'channels'));
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
        $request->validate([
            'channel_id' => 'required',
            'title' => 'required',
            'body' => 'required'

        ]);

        $discusion = Discusion::find($id);


        $discusion->channel_id = $request->channel_id;
        $discusion->title = $request->title;
        $discusion->body = $request->body;

        $discusion->save();

        return redirect()->route('discusions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discusion = Discusion::find($id);

        $discusion->delete();

        return redirect()->route('discusions.index');
    }
}
