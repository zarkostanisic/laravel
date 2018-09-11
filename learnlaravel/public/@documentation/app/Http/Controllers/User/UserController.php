<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;

class UserController extends \App\Http\Controllers\Controller
{
	public function __construct(){
		// $this->middleware('checkRole:editor')->except('show');
		$this->middleware('checkRole:editor')->only('show');
	}

    public function index(){
    	dd(User::find(1)->email);
    }

    public function show($id){
    	dd($id);
    }
}
