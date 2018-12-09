<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;

class FrontendController extends Controller
{
    public function welcome(){
    	$this->setSeo('test');

    	$series = Series::All();

    	return view('welcome', compact('series'));
    }

    public function series(Series $series){
    	return view('series', compact('series'));
    }
}
