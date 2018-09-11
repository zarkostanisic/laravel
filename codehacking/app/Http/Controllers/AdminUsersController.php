<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;
use App\Image;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;

use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
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
        $roles = Role::pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        if($file = $request->file('image_id')){
            $image_name = time() . $file->getClientOriginalName();

            $file->move('images', $image_name);

            $image = Image::create(['image' => $image_name]);

            $input['image_id'] = $image->id;
        }
        
        User::create($input);

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('admin.users.show', compact('id'));
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
         $roles = Role::pluck('name', 'id');

         return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::find($id);

        if(trim($request->password) == '') { 
            $input = $request->except('password');
        }else {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('image_id')){
            $image_name = time() . $file->getClientOriginalName();

            $file->move('images', $image_name);

            $image = Image::create(['image' => $image_name]);

            $input['image_id'] = $image->id;
        }

        $user->update($input);

        return redirect(route('admin.users.index'));
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

        @unlink(public_path() . $user->image->image);
        
        $user->delete();

        Session::flash('deleted_user', 'User '. $user->id . ' deleted');

        return redirect(route('admin.users.index'));
    }
}
