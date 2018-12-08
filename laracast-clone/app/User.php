<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Entities\Learning;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, Learning;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = [
        'subscriptions'
    ];

    public function isConfirmed(){
        return $this->confirm_token == null;
    }

    public function confirm(){
        $this->confirm_token = null;
        $this->save();
    }

    public function isAdmin(){
        return in_array($this->email, config('site.administrators'));
    }
}
