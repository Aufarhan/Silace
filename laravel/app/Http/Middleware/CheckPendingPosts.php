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
    
            // Pastikan hanya mengatur pesan 'success' jika tidak ada pesan 'error' di sesi
            if ($pendingPostsCount > 0 && !session()->has('error')) {
                session()->flash('success', "Anda memiliki $pendingPostsCount laporan yang diterima, cek dashboard anda.");
            }
        }
            
        return $next($request);
    }    
}


