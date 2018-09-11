<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($role == 'editor') return redirect('/');;

        return $next($request);
    }

    public function terminate($request, $response)
    {
        print_r($request->all());
    }
}
