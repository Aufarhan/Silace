<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Region;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show(Post $post, Status $status){
        if (in_array($post->status_id, [5, 6, 7]) && $post->user_id !== auth()->id()) {
            abort(404);
        }

        $post = Post::where('slug', $post->slug)->firstOrFail();
            
        return view('post', [
            "title" => $post->title,
            "post" => $post
        ]);
    }

    public function laporan(){

        if(request('region')){
            $region = Region::firstWhere('slug', request('region'));
            $title = $region->wilayah;
        }
        
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('laporan', [
            'title' => 'Laporan',
            "posts" => Post::whereIn('status_id', [1, 3, 4])->latest()->filter(request(['search', 'category', 'author', 'region','status']))->paginate()->withQueryString(),
            'categories' => Category::all(),
            'status' => Status::all(),
            'regions' => Region::all(),
            "search" => 'laporan',
        ]);
    }

    public function aktivitas(){

        if(request('region')){
            $region = Region::firstWhere('slug', request('region'));
            $title = $region->wilayah;
        }

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('aktivitas', [
            'title' => 'Aktivitas',
            "posts" => Post::whereIn('status_id', [1, 3, 4])->latest()->where('category_id',1)->filter(request(['search', 'category','author','region']))->paginate(9)->withQueryString(),
            "search" => 'aktivitas',
        ]);
    }

    public function informasi(){

        if(request('region')){
            $region = Region::firstWhere('slug', request('region'));
            $title = $region->wilayah;
        }

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('informasi', [
            'title' => 'Informasi',
            "posts" => Post::whereIn('status_id', [1, 3, 4])->latest()->where('category_id',5)->filter(request(['search', 'category','author','region']))->paginate(9)->withQueryString(),
            "search" => 'informasi',
        ]);
    }

}