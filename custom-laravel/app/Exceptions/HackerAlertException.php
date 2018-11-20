<?php

namespace App\Exceptions;

use Exception;
use Log;

class HackerAlertException extends Exception{

	public function report(){
		Log::critical('Hacker not found');
	}
	public function render(){
        return response()->json([
            'message' => 'Hacker not found'
        ]);
	}
}