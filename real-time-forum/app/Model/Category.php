<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;

class Category extends Model
{
    public function questions(){
    	return $this->belongsTo(Question::class);
    }
}
