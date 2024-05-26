<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;

class CheckPendingPosts
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
        if (auth()->check()) {
            $pendingPostsCount = Post::where('user_id', auth()->user()->id)
                ->where('status_id', 1)
                ->count();

            if ($pendingPostsCount > 0) {
                session()->flash('success', "Anda memiliki $pendingPostsCount laporan yang diterima, cek dashboard anda.");
            }
        }

        return $next($request);
    }
}


