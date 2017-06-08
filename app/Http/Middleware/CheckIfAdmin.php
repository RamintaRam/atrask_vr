<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
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
//        dd(auth()->user()->rolesConnections());

        if(in_array("super-admin", auth()->user()->connection()->pluck('id')->toArray()))
        return $next($request);


        return redirect('home');

    }
}
