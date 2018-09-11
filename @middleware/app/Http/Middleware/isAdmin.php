<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user = Auth::user();
        
        if($user == NULL || !$user->isAdmin()) return redirect()->intended('/');

        return $next($request);
    }
}
