<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Employeer
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
        if(Auth::guard('employeer')->user()->isEmployeer == 1){
            return $next($request);
          }
            return redirect('home')->with('error','You have not Employeer access');
    }
}
