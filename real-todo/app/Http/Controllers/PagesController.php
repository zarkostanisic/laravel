<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function new(){
    	// echo "some echoed data";
    	
    	return view('new');
    }
}
