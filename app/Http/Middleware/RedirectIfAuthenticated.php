<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		switch ($guard) {
			case 'admin':
				if (Auth::guard($guard)->check()) {
					return redirect()->route('admin.index');
				}
			break;
			case 'guru':
				if (Auth::guard($guard)->check()) {
					return redirect()->route('guruuser.index');
				}
			break;
			case 'siswa':
				if (Auth::guard($guard)->check()) {
					return redirect()->route('siswauser.index');
				}
			break;

			default:
				if (Auth::guard($guard)->check()) {
					return redirect()->route('guest.index');
				}
			break;
		}
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        return $next($request);
    }
}
