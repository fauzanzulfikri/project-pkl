<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna sedang autentikasi
        if (! $request->user()) {
            return redirect('/login');
        }

        // Lakukan pengecekan peran pengguna
        switch ($role) {
            case 'admin':
                if ($request->user()->isAdmin()) {
                    return $next($request);
                }
                break;
            case 'teknisi':
                if ($request->user()->isTeknisi()) {
                    return $next($request);
                }
                break;
            case 'pelapor':
                if ($request->user()->isPelapor()) {
                    return $next($request);
                }
                break;
        }

        abort(403, 'Unauthorized');
    }
}
