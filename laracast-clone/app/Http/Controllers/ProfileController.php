<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index(User $user){
    	$series = $user->seriesBeingWatched();

    	return view('profile.index', compact('user', 'series'));
    }
}
