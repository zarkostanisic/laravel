<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watcher extends Model
{
    protected $fillable = [
    	'discusion_id', 'user_id'
    ];
}
