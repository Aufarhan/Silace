<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $post = $request->route()->parameter('post');
        
        // if(!$post->is_public && (!auth()->check() || !auth()->user()->is_admin)){
        //     abort(403);
        // }
        
        return $next($request);
    }
}