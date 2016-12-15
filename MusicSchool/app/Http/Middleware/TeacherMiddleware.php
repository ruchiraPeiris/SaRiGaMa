<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class TeacherMiddleware
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
        if(Auth::user()->account_type == "A" || Auth::user()->account_type == "B"){
            return $next($request);
        }else{
            return redirect()->route('/home');
        }
    }
}
