<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserShouldVerified
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
        $response = $next($request);
        if (Auth::check() && !Auth::user()->is_verified) {
            Auth::logout();
            alert()->warning('Silahkan klik pada link aktivasi yang telah kami kirim.','')->persistent('Close');
            return redirect('/admin-l');
        }
        return $response;
    }
}