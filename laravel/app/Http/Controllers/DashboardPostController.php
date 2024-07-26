<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Region;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $user = auth()->user();
        $statusFilter = $request->input('status');
        $searchFilter = $request->input('search');

        // Mulai query dengan kondisi awal
        $query = Post::query();

        // Jika bukan admin, filter berdasarkan user_id
        if (!$user->is_admin) {
            $query->where('user_id', $user->id);
        }

        // Terapkan filter status jika ada
        if ($statusFilter) {
            $query->where('status_id', $statusFilter);
        }

        if ($searchFilter) {
            $query->filter(request(['search', 'category', 'author', 'region','status']))->paginate()->withQueryString();
        }

        // Urutkan berdasarkan updated_at terbaru
        $query->orderByDesc('updated_at');

        $title = 'Hapus Laporan?';
        $text = "Apakah benar anda yakin ingin menghapus laporan ini?";
        confirmDelete($title, $text);

        // Terapkan pagination
        $posts = $query->paginate(8);

        return view('dashboard.posts.index', [
            "title" => "Laporan",
            "posts" => $posts,
            'categories' => Category::all(),
            'regions' => Region::all(),
            'statuses' => Status::all(),
            'search' => 'dashboard/posts',
            'statusFilter' => $statusFilter // Untuk mengingat status yang dipilih di dropdown
        ]);
    }

    public function verifikasi(Request $request)
    {
        $user = auth()->user();
        $statusFilter = $request->input('status');

        // Mulai query dengan kondisi awal
        $query = Post::query();

        // Jika bukan admin, filter berdasarkan user_id
        if (!$user->is_admin) {
            $query->where('user_id', $user->id);
        }
        
        // Query logic to retrieve data for verification
        $statusFilter = $request->input('status');

        $query = Post::query();

        if ($statusFilter) {
            $query->where('status_id', $statusFilter);
        }

        $posts = $query->where('status_id', 2)->paginate(8);

        return view('dashboard.posts.verifikasi', [
            'title' => 'Verifikasi Laporan',
            'posts' => $posts,
            'categories' => Category::all(),
            'regions' => Region::all(),
            'statuses' => Status::all(),
            'statusFilter' => $statusFilter,
        ]);
    }

    public function updateStatus(Request $request, Post $post)
    {
        $post->status_id = 1; // Ubah status_id menjadi 1
        $post->save();

        return redirect()->route('dashboard.verifikasi')->with('success', 'Status laporan berhasil diperbarui.');
    }
    // Fungsi untuk menampilkan halaman proses laporan
public function proses(Request $request)
{
    $user = auth()->user();
    $statusFilter = $request->input('status');

    // Mulai query dengan kondisi awal
    $query = Post::query();

    // Jika bukan admin, filter berdasarkan user_id
    if (!$user->is_admin) {
        $query->where('user_id', $user->id);
    }
    
    // Filter berdasarkan status jika diberikan
    if ($statusFilter) {
        $query->where('status_id', $statusFilter);
    }

    // Ambil post berdasarkan status tertentu
    $posts = $query->whereIn('status_id', [1, 3, 5, 6])->paginate(8);

    return view('dashboard.posts.proses', [
        'title' => 'Proses Laporan',
        'posts' => $posts,
        'categories' => Category::all(),
        'regions' => Region::all(),
        'statuses' => Status::all(),
        'statusFilter' => $statusFilter,
    ]);
}

// Fungsi untuk meng-update status laporan
public function updateProses(Request $request, Post $post)
{
    // Validasi input
    $request->validate([
        'komentar' => 'nullable|string|max:5000',
        'status_id' => 'required|integer|in:2,3,4', // validasi untuk status_id
    ]);

    // Ambil data dari request
    $komentar = $request->input('komentar');
    $status_id = $request->input('status_id', 2); // default status_id = 2

    // Jika bukan admin, pastikan status tidak bisa menjadi 3 atau 4
    if (!auth()->user()->is_admin && in_array($status_id, [3, 4])) {
        return redirect()->route('dashboard.proses')->with('error', 'Anda tidak memiliki hak untuk melakukan tindakan ini.');
    }

    // Update status dan komentar
    $post->status_id = $status_id;
    $post->komentar = $komentar;
    $post->save();

    return redirect()->route('dashboard.proses')->with('success', 'Status laporan berhasil diperbarui.');
}
    
    public function lobby()
    {
         // Hitung laporan yang dimiliki oleh pengguna
    $userReportsCount = Post::where('user_id', auth()->user()->id)->count();
    $allUserReportsCount = Post::count();
    $acceptedReportsCount = Post::where('user_id', auth()->user()->id)->where('status_id', 1)->count();
    $allAcceptedReportsCount = Post::where('status_id', 1)->count();
    $verifReportsCount = Post::where('status_id', 2)->count();
    $inProgressReportsCount = Post::where('user_id', auth()->user()->id)->where('status_id', 3)->count();
    $allInProgressReportsCount = Post::where('status_id', 3)->count();
    $finishedReportsCount = Post::where('status_id', 4)->count();
    $privacyReportsCount = Post::where('status_id', 5)->count();

    return view('dashboard', [
        'userReportsCount' => $userReportsCount,
        'allUserReportsCount' => $allUserReportsCount,
        'acceptedReportsCount' => $acceptedReportsCount,
        'allAcceptedReportsCount' => $allAcceptedReportsCount,
        'verifReportsCount' => $verifReportsCount,
        'inProgressReportsCount' => $inProgressReportsCount,
        'allInProgressReportsCount' => $allInProgressReportsCount,
        'finishedReportsCount' => $finishedReportsCount,
        'privacyReportsCount' => $privacyReportsCount,
        'categories' => Category::all(),
        'regions' => Region::all(),
        'statuses' => Status::all(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts',[
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
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'region_id' => 'required',
            'status_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
            'lokasi' => 'required',
            'komentar' => 'nullable',
        ]);
        
        // Simpan post
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['komentar'] = "";
        $post = Post::create($validatedData);
        
        // Simpan gambar
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $cleanTitle = Str::slug($post->title);
                $uniqueId = uniqid();
                $fileExtension = $image->getClientOriginalExtension();
                $fileName = $cleanTitle . '-' . $uniqueId . '.' . $fileExtension;
                $imagePath = $image->storeAs('post-images', $fileName, 'public');
                $images[] = $imagePath;
            }
            $post->images = $images;
            $post->save();
        }
        $post->komentar = "";
        
        return redirect('/dashboard')->with('success', 'Laporanmu sudah masuk, Tunggu kami verifikasi ya!');
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
            'post' => $post,
            'categories' => Category::all(),
            'regions' => Region::all(),
            'statuses' => Status::all(),
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
            'regions' => Region::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'region_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar dengan ukuran maksimal
            'body' => 'required',
            'lokasi' => 'required',
            'status_id' => 'required|integer' // Validasi status_id jika ada
        ]);
    
        // Cari post berdasarkan slug
        $post = Post::where('slug', $slug)->firstOrFail();
    
        // Menghapus gambar yang dipilih untuk dihapus
        if ($request->filled('remove_images')) {
            $imagesToRemove = explode(',', $request->remove_images);
            $remainingImages = array_diff($post->images ?? [], $imagesToRemove);
    
            foreach ($imagesToRemove as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
    
            $post->images = array_values($remainingImages);
        }
    
        // Update atribut post
        $post->fill([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'region_id' => $request->region_id,
            'body' => $request->body,
            'lokasi' => $request->lokasi,
            'status_id' => Auth::user()->is_admin ? $request->status_id : 2, // Tetapkan status_id berdasarkan peran user
        ]);
    
        // Simpan foto-foto baru
        if ($request->hasFile('images')) {
            $images = $post->images ?? [];
            foreach ($request->file('images') as $image) {
                $cleanTitle = Str::slug($post->title);
                $uniqueId = uniqid();
                $fileExtension = $image->getClientOriginalExtension();
                $fileName = $cleanTitle . '-' . $uniqueId . '.' . $fileExtension;
                $imagePath = $image->storeAs('post-images', $fileName, 'public');
                $images[] = $imagePath;
            }
            $post->images = $images;
        }
    
        // Update waktu posting menjadi waktu saat ini
        $post->updated_at = Carbon::now();
    
        // Simpan perubahan pada model
        $post->save();
    
        return redirect('/dashboard/posts')->with('success', 'Laporanmu berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Hapus gambar dari penyimpanan
        if ($post->images) {
            foreach ($post->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
    
        // Menghapus postingan
        $post->delete();
    
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted successfully!');
    }
    

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}