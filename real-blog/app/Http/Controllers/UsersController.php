<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $profile = Profile::create([
            'user_id' =>  $user->id,
        ]);

        return redirect()->route('users.index')->with('success', 'User has been created.');
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
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
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
            'name' => 'required',
            'password' => 'confirmed',
            'about' => 'required',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'avatar' => 'image',
        ]);

        $user = User::find($id);

        $user->name = $request->name;

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = $avatar_new_name;
        }

        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->profile->save();
        $user->save();


        return redirect()->route('users.index')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        return redirect()->route('users.index')->with('User has been deleted.');
    }

    public function admin($id){
        $user = User::find($id);
        $user->admin = !$user->admin;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User permission has been changed.');
    }
}
