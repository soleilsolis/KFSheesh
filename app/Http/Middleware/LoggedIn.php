<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('user')){
            if(!$request->is('*')){
                return redirect('/login');
            }
        }else{
            $type = session('user')->type;

            if($request->is("$type/*") != $type){
                return redirect("$type/dashboard");      
            }  
        }

        return $next($request);
    }
}
