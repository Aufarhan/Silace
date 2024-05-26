<x-guest-layout>
<section class="w-full bg-primary pt-[1dvh] pb-[6dvh]">
    <div class="background md:container  md:py-4 py-2 rounded-[1rem] shadow-lg shadow-hitam/10 md:mx-auto mx-2">
        <div class="flex flex-col justify-center items-center gapy" id="title">
          <h1 class="text-primary dark:text-primary text-center">Laporan-laporan</h1>
          <h2>Yang telah masuk ke Silace</h2>
        </div>
        <div class="gapy">
          @include('partials.searchbar')
        </div>

        <div class="grid justify-center md:justify-start pt-2 px-2">
          <div>
            <h1 class="font-black uppercase text-xl md:text-2xl text-primary dark:text-primary md:text-left text-center">Jenis Laporan</h1>
          </div>
        </div>

        <form action="/laporan">
          <div class="carousel px-4 py-2" data-flickity='{ "freeScroll": true, "contain": true, "pageDots": false }'>
              <button class="py-2 px-0.5" value="">
                  <div class="carousel-cell rounded-lg ring-2 ring-primary px-10 py-2">Semua</div>
              </button>
              @foreach ($categories as $category)
              <button class="py-2 px-0.5 mx-2"  name="category" value="{{ $category->slug }}">
                  <div class="carousel-cell rounded-lg ring-2 ring-primary px-10 py-2">{{ $category->name }}</div>
              </button>
              @endforeach
          </div>
        </form>
        <div>
          @if($posts->count())
          <div class="flex flex-wrap justify-center justify-items-center gapy gap-[20px] w-full">
            <a href="/posts/{{ $posts[0]->slug }}" class="w-full flex flex-col justify-between layer2 rounded-[40px] h-auto shadow-md  group  container py-[20px] relative">
              <div id="postcat" class="absolute -top-2 -right-2 py-1.5 px-4 rounded-[10px] bg-primary shadow-md">
                <h2 class="text-sm text-white">{{ $posts[0]->category->name }}</h2>
              </div>
              <div id="imgpost" class="w-full rounded-[30px] overflow-hidden items-center justify-center shadow-md" >
                @if($posts[0]->images)
                <img src="{{ asset('storage/' . $posts[0]->images[0]) }}" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
                @else
                <img src="https://source.unsplash.com/500x500/?purple" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
                @endif
              </div>
              <div class="pt-[20px]">
                <div class="text-center">
                  <p class="text-black/60 dark:text-white/60 pb-1 text-sm">{{ $posts[0]->region->kecamatan }}, {{ $posts[0]->region->wilayah }} | {{ $posts[0]->created_at->diffForHumans() }} | Status: {{ $posts[0]->status->name }}</p>
                  <h2 class="text-primary dark:text-primary pb-1" data-title="4. Terverifikasi" data-intro="Jika laporanmu sudah diterima, diverifikasi dan juga memiliki sifat publik, maka laporanmu dapat dilihat oleh publik disini!." data-step="4">{{ $posts[0]->title }}</h2>
                  <p>{!! Str::limit($posts[0]->excerpt, 40) !!}</p>
                </div>
              </div>
            </a>
            <div class="flex flex-col gap-4 mx-[12.5px]">
              @foreach ($posts->skip(1)->slice(0,3) as $post)
              <a href="/posts/{{ $post->slug }}" class="w-full flex flex-row justify-start layer2 rounded-[40px] h-[24dvh] shadow-md  group  container gapy relative ">
                <div id="postcat" class="absolute -top-3 -right-2 py-1.5 px-4 rounded-[10px] bg-primary shadow-md">
                  <h2 class="text-sm text-white">{{ $post->category->name }}</h2>
                </div>
                <div id="imgpost" class="w-1/3 rounded-[30px] overflow-hidden items-center justify-center shadow-md">
                  @if($post->images)
                  <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="h-full w-full object-cover flex">
                  @else
                  <img src="https://source.unsplash.com/500x500/?purple" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
                  @endif
                </div>
                <div class="px-3 w-2/3">
                  <div class="text-left">
                    <p class="text-black/60 dark:text-white/60 pb-1 text-sm">{{ $post->region->kecamatan }}, {{ $post->region->wilayah }} | Status: {{ $post->status->name }}</p>
                    <h2 class="text-primary dark:text-primary pb-1">{!! Str::limit($post->title, 55) !!}</h2>
                    <p class="truncate">{!! Str::limit($post->excerpt, 55) !!}</p>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
      
          @else
            <div class="py-16">
            <h3 class="text-center px-4">Tidak ada artikel tersebut, coba cari di Kategori lainnya.</h3>
            </div>
          </div>
          @endif
                
        @include('partials.pagination')

        </div>

    </div>
</x-guest-layout>