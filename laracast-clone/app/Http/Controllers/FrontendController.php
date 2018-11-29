<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;

class FrontendController extends Controller
{
    public function welcome(){
    	$series = Series::All();

    	return view('welcome', compact('series'));
    }
}
