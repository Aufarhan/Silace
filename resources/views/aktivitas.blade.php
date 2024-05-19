@extends('layouts.main')
@section('container')

<section class="bg-secondary py-4 w-full">
    <div class="md:container md:p-0 md:mx-auto mx-2">
        <div class=" layer1 rounded-[1rem] flex flex-col items-center py-7 justify-center px-4">
            <div>
                <h1 class="text-center py-2 text-hitam animate__animated animate__fadeInDown delay-4">Selamat datang di {{ $title }} Silace</h1> 
            </div>
            <div>
                <h2 class="text-center text-hitam animate__animated animate__fadeInDown delay-3">Menampilkan <span class="text-primary dark:text-primary">{{ ($title === "Aktivitas") ? '📷' : '📣' }} {{ $title }}</span> terbaru terkait <span class="text-primary dark:text-primary">Silace</span></h2>
            </div>
        </div>
    </div>

    @include('partials.searchbar')


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
                <h2 class="line-clamp-4 text-hitam group-hover:text-primary dark:text-primary transition duration-200 ease-in-out">{{ $posts[0]->title }}</h2>
                <p class="line-clamp-4 md:line-clamp-6 text-hitam mt-[2dvh]">{!! Str::limit($posts[0]->excerpt, 500) !!}</p>
              </div>
              <div class="absolute bottom-3 md:bottom-8 flex flex-row">
                <div>
                  <a href="/laporan?category={{ $posts[0]->category->slug }}">
                    <p class="text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out hover:underline">{{ $posts[0]->category->name }} </p>
                  </a>
                </div>
                <div class="px-0.5">
                <p class="text-hitam"><span class="text-hitam/40">|</span> {{ $posts[0]->created_at->diffForHumans() }}</p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>


      <div class="grid md:grid-cols-4 grid-cols-1 gap-3 my-3 md:container md:p-0 md:mx-auto mx-2 md:mt-6">
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
                  <h2 class="text-lg md:text-xl pb-0.5  text-hitam   line-clamp-4 group-hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out"><a href="/posts/{{ $post->slug }}">{{ $post->title }}  </a></h2>
                                
                  <p class="md:block hidden    line-clamp-4 md:line-clamp-6 text-hitam">{!! Str::limit($post->excerpt, 100) !!}</p>
                  <div class="flex absolute bottom-2 left-4 md:hidden flex-row">
                    <div>
                      <a href="/laporan?category={{ $post->category->slug }}">
                        <p class="text-sm text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out hover:underline">{{ $post->category->name }} </p>
                      </a>
                    </div>
                    <div class="px-0.5">
                    <p class="text-sm text-hitam"><span class="text-hitam/40">|</span> {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                  </div>
              </div>
              <div class="hidden absolute bottom-4 left-4 md:flex flex-row">
                <div>
                  <a href="/laporan?category={{ $post->category->slug }}">
                    <p class="text-sm text-primary dark:text-primary hover:text-primary dark:text-primary/50 transition duration-200 ease-in-out hover:underline">{{ $post->category->name }} </p>
                  </a>
                </div>
                <div class="px-0.5">
                <p class="text-sm text-hitam"><span class="text-hitam/40">|</span> {{ $post->created_at->diffForHumans() }}</p>
                </div>
              </div>
          </div>
        @endforeach
      </div>
        @else
          <div class="py-16">
          <h3 class="text-center px-4 text-hitam/80">Tidak ada artikel tersebut, coba cari di Kategori lainnya.</h3>
          </div>
    @endif
            
    @include('partials.pagination')

</section>

@endsection