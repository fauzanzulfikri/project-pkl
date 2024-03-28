<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Teknisi
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
        if(Auth()->guest()){
            return redirect('/login');
        }
        if(Auth()->User()->level === 'pelapor'){
            abort(403,'Unauthorized');
        }
        return $next($request);
    }
}
