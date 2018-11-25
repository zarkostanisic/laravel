<?php

namespace App\Exceptions;

use Exception;

class AuthFailedException extends Exception
{
    public function render(){
    	return response()->json([
    		'message' => 'These credential do not match our records'
    	], 422);
    }
}
