<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Contracts\Routing\Middleware;
use Closure;

class IsAdmin
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

        if(Auth::check()){
            if (Auth::user()->role()->name == 'admin')
                return $next($request);
            else
                abort(403, 'Unauthorized');
        }
        
        return redirect('/login');
    }
}
