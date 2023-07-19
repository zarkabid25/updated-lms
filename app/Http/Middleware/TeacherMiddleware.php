<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->roles()->first()->name == 'Teacher'){
            $res = substr(request()->path(), 0, 7);
            if($res == 'teacher'){
                return $next($request);
            } else{
                return redirect(RouteServiceProvider::HOME);
            }
        } else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
