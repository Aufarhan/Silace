<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Region;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all(),
            'regions' => Region::all(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'region_id' => 'required',
            'status_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk setiap gambar
            'body' => 'required',
            'lokasi' => 'required',
        ]);
    
        $images = [];
    
        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path =  $image->storeAs('post-images', $fileName,'public');
    
                array_push($images, $image_path);
            }
        }


        
        $validatedData['images'] = $images;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);
        return redirect('/dashboard')->with('success','New Post has been published');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all(),
            'regions' => Region::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'region_id' => 'required',
            'status_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk setiap gambar
            'body' => 'required',
            'lokasi' => 'required',
        ];
        
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        
        $validatedData = $request->validate($rules);
        
        // Hapus foto-foto sebelumnya
        if ($post->images) {
            foreach ($post->images as $image) {
                unlink(storage_path('app/public/'.$image));
            }
        }
    
        // Simpan foto-foto baru
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('post-images', $fileName, 'public');
                array_push($images, $imagePath);
            }
        }
    
        $validatedData['images'] = $images;

    
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        $post->update($validatedData);
    
        return redirect('/dashboard')->with('success','Post has been updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->images){
            foreach($post->images as $image) {
                // Hapus file dari penyimpanan menggunakan Storage facade
                unlink(storage_path('app/public/'.$image));
            }
        }
        
        // Menghapus postingan
        $post->delete();

        return redirect('/dashboard')->with('success','Post has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}