<?php

namespace App\Http\Middleware;

use Closure;

class HomeloginMiddleware
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
       if($request->session()->get('id')){
            return $next($request);
        }else{
            return redirect('/login/login');
        }
    }
}
