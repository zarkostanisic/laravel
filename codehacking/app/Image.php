<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'image'
    ];

    protected $upload_dir = '/images/';

    public function getImageAttribute($value){
    	return $this->upload_dir . $value;
    }
}
