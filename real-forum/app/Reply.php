<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
    	'user_id', 'discusion_id', 'title'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

     public function discusion(){
        return $this->belongsTo('App\Discusion');
    }
}
