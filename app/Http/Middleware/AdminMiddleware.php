<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (auth()->user()->roles()->first()->name == 'Admin') {
            $res = substr(request()->path(), 0, 5);
            if ($res == 'admin') {
                $activity = (new Setting)->getSetting('activity');
                $inactivity = (new Setting)->getSetting('inactivity');
                if (Carbon::now()->diffInMinutes(Carbon::parse($activity->value)) < $inactivity->value) {
                    $activity->update([
                        'value' => Carbon::now()
                    ]);
                    return $next($request);
                }else{
                    auth()->logout();
//                    toastr()->error('Your session has been logout due to inactivity of '.$inactivity->value.' minutes.', 'Oops!');
                    return redirect('/login')->with('error', 'Your session has been logout due to inactivity of '.$inactivity->value.' minutes.' );
                }
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
