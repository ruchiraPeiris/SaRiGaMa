<?php

namespace App\Http\Middleware;

use Closure;

class dummyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //rank
        //admin = 1 teacher = 2

        if(Auth::user()->rank == 5){
            return $next($request);
        }else{
            return redirect()->route('/home');
        }

    }
}




//if(1 == 1){
//    //$request->Attribute = '2';
//    $request->merge(array("myVar" => "1"));
//    return $next($request);
//}else{
//    $request->merge(array("myVar" => "2"));
//    return $next($request);
//
//}
