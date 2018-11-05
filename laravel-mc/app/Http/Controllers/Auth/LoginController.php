<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        $user = User::where('email', $userSocial->user['email'])->first();

        if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect(route('home'));
            }
        }else{
            $userSignup = User::create([
                'name' => $userSocial->user['name'],
                'email' => $userSocial->user['email'],
                'password' => bcrypt(rand(1, 10)),
                'avatar' =>  isset($userSocial->user['avatar']) ? $userSocial->user['avatar'] : '',
                'facebook_profile' =>  isset($userSocial->user['link']) ? $userSocial->user['link'] : '',
                'gender' =>  isset($userSocial->user['gender']) ? $userSocial->user['gender'] : ''
            ]);

            if($userSignup){
                if(Auth::loginUsingId($userSignup->id)){
                    return redirect(route('home'));
                }
            }
        }

    }
}
