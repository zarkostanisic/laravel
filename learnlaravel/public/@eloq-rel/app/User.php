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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - one to one
    |--------------------------------------------------------------------------
    */
    public function post(){
        return $this->hasOne('App\Post');
    }

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - one to many
    |--------------------------------------------------------------------------
    */
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT relations - many to many
    |--------------------------------------------------------------------------
    */
    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }

    /*
    |--------------------------------------------------------------------------
    | ELOQUENT POLYMORPHIC relations - one to many - one table with data for many tables
    |--------------------------------------------------------------------------
    */
    public function images(){
        return $this->morphMany('App\Image', 'imagable');
    }
}
