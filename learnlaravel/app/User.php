<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //one to one
    public function post(){
        return $this->hasOne('App\Post');
        
        //customize
        //return $this->hasOne('App\Post', 'user_id');
    }

    // one to many
    public function posts(){
        return $this->hasMany('App\Post', 'user_id');
    }

    // many to many - pivot
    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
        
        //customize
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');

    }

    //polymorphic
    public function photos(){
        return $this->morphMany('App\Photo', 'imagable');
    }
}
