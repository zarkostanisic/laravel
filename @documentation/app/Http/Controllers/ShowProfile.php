<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowProfile extends Controller
{
	public function __construct(){
		$this->middleware('checkRole:editor');
	}
    public function __invoke($id){
    	echo $id;
    }
}
