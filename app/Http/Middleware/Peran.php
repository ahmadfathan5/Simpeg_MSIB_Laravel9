<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
//tambahan
use Illuminate\Http\Request;

class Peran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $peran)
    {
        /* ---------all peran-------
        if(Auth::check() && Auth::user()->role == 'peran' ){
        return $next($request);
        }
         */
        //multiple peran
        if (Auth::check()) {
            $perans = explode('-', $peran);
            foreach ($perans as $group) {
                if (Auth::user()->role == $group) {
                    return $next($request);
                }
            }
        }

        return redirect('/access_denied');
    }
}
