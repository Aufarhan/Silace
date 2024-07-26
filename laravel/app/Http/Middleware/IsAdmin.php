<?php

// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->is_admin != 1) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return $next($request);
    }
}
