@extends('layouts.main')
@section('container')

<section class="layer1 py-4 mt-2 w-full">
    <div class="md:container md:mx-auto mx-2">
        <div class=" bg-secondary rounded-[1rem] flex flex-col items-center py-7 justify-center px-4">
            <div>
                <h1 class="font-semibold text-sm  md:text-base text-hitam/80  text-center uppercase tracking-wide py-2">Selamat datang di {{ $title }} Silace</h1> 
            </div>
            <div>
                <h1 class="text-xl  md:text-3xl font-bold text-center">Menampilkan <span class="text-primary dark:text-primary logo">{{ ($title === "Aktivitas") ? '📷' : '📣' }} {{ $title }}</span> terbaru terkait <span class="text-primary dark:text-primary logo">Silace</span></h1>
            </div>
        </div>
    </div>

    <div class="md:container md:mx-auto mx-2 py-5">
        <form action="/posts">    
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <label for="default-search" class="mb-2 text-sm font-medium text-hitam sr-only ">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" name="search" class="block p-4 pl-10 w-full text-sm text-hitam bg-secondary rounded-[1rem] border border-gray-300 focus:ring-primary focus:border-primary " 
                placeholder="Telusuri.." value="{{ request('search') }}">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-button hover:bg-buttonh duration-150 transition ease-out focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm uppercase px-6 py-2 ">
                    Cari</button>
            </div>
        </form>
    </div>


    @if ($posts->count())
      <div class="md:container md:p-0 md:mx-auto mx-2  h-auto md:h-[40dvh]">
        <a href="/posts/{{ $posts[0]->slug }}">
          <div class="grid md:grid-cols-2 grid-rows-2 md:grid-rows-none layer1 rounded-[1rem] ring-1 ring-slate-200 shadow-lg shadow-hitam/10 group overflow-hidden">
            <div class="w-full md:h-[400px] h-[300px]  rounded-[1rem] md:rounded-r-none rounded-b-none md:rounded-bl-[1rem] overflow-hidden">
              @if($posts[0]->images)
                <img src="{{ asset('storage/' . $posts[0]->images[0]) }}" alt="{{ $posts[0]->category->name }}" class="h-full object-cover group-hover:scale-105 transition duration-200 ease-in-out flex justify-center items-center">
              @else           
                <img class="h-full object-cover group-hover:scale-105 transition duration-200 ease-in-out flex justify-center items-center" src="https://source.unsplash.com/800x600/?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->title }}">
              @endif
            </div>
            <div class="md:py-8 py-3 px-3 md:px-8  relative">
              <div>
                <h1 class="md:text-4xl text-3xl   line-clamp-4 font-semibold logo text-hitam group-hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->title }}</h1>
                <h3 class="font-light leading-relaxed   line-clamp-4 md:line-clamp-6 text-hitam">{!! Str::limit($posts[0]->excerpt, 500) !!}</h3>
              </div>
              <div class="absolute bottom-3 md:bottom-8 flex flex-row">
                <div>
                  <a href="/laporan?category={{ $posts[0]->category->slug }}">
                    <h3 class="text-base font-normal text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->category->name }} </h3>
                  </a>
                </div>
                <div class="px-0.5">
                <h3 class="text-base font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $posts[0]->created_at->diffForHumans() }}</h3>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


      <div class="grid md:grid-cols-4 grid-cols-1 gap-3 my-3 md:container md:p-0 md:mx-auto mx-2">
        @foreach ($posts->skip(1) as $post)
          <div class="md:grid-cols-1 grid-cols-2 grid content-start h-[25dvh]  md:h-[45dvh] layer1 rounded-[1rem] ring-1 ring-slate-200 shadow-lg shadow-hitam/10 overflow-hidden relative group"  data-aos="fade-down" data-aos-anchor-placement="center-bottom">
              <div class="md:h-[20dvh] h-[25dvh]">
                @if($post->images)
                <a href="/posts/{{ $post->slug }}">
                    <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->category->name }}" class="h-full w-[400px] object-cover group-hover:scale-105 transition duration-200 ease-in-out">
                </a>
                @else           
                <a href="/posts/{{ $post->slug }}">
                    <img class="h-full w-[400px] object-cover group-hover:scale-105 transition duration-200 ease-in-out" src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="{{ $post->title }}">
                </a>
                @endif
              </div>
              <div class="pb-2 px-4 py-2 relative">
                  <h5 class="logo pb-0.5 md:text-xl text-lg font-semibold tracking-tight text-hitam   line-clamp-4 group-hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out"><a href="/posts/{{ $post->slug }}">{{ $post->title }}  </a></h5>
                                
                  <p class="md:block hidden font-light text-sm leading-relaxed   line-clamp-4 md:line-clamp-6 text-hitam">{!! Str::limit($post->excerpt, 100) !!}</p>
                  <div class="flex absolute bottom-2 left-4 md:hidden flex-row">
                    <div>
                      <a href="/laporan?category={{ $posts[0]->category->slug }}">
                        <h3 class="text-sm font-normal text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->category->name }} </h3>
                      </a>
                    </div>
                    <div class="px-0.5">
                    <h3 class="text-sm font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $posts[0]->created_at->diffForHumans() }}</h3>
                    </div>
                  </div>
              </div>
              <div class="hidden absolute bottom-4 left-4 md:flex flex-row">
                <div>
                  <a href="/laporan?category={{ $posts[0]->category->slug }}">
                    <h3 class="text-sm font-normal text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out">{{ $posts[0]->category->name }} </h3>
                  </a>
                </div>
                <div class="px-0.5">
                <h3 class="text-sm font-normal text-hitam"><span class="text-hitam/40">|</span> {{ $posts[0]->created_at->diffForHumans() }}</h3>
                </div>
              </div>
          </div>
        @endforeach
      </div>
        @else
<div class="py-16">
<p class="text-center text-xl px-4 text-hitam/80">Tidak ada artikel tersebut, coba cari di Kategori lainnya.</p>
</div>
    @endif
            
    <div class="flex flex-col justify-center py-9">
        <div class="flex justify-center py-2">
        {{ $posts->links() }}  
        </div>
        <div class="flex justify-center  mt-2">{{($posts->currentpage()-1)*$posts->perpage()+1}}-{{$posts->currentpage()*$posts->perpage()}}
            dari  {{$posts->total()}} {{ $title }}
        </div>
    </div>

</section>
@endsection