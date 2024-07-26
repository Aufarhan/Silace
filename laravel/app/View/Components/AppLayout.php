<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
