<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Belumlogin
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
        if (session('id_user') != NULL) {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
