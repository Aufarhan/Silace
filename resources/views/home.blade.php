<x-guest-layout>
<section id="hero" class="background z-30 relative">
  <div class="hidden md:block fixed bottom-4 right-4">
    <x-primary-button onclick="introJs().start();" class="text-sm shadow-md">
      {{ __('?') }}
    </x-primary-button>
  </div>
  <div class="flex flex-col justify-center items-center container">
    <div class="bg-gradient-to-b from-primary to-violet-400 md:h-[70dvh] h-[36dvh] rounded-[20px] md:rounded-t-[0px] overflow-hidden flex items-center justify-center pt-[8dvh] md:mt-[0dvh] mt-[2dvh] md:relative md:overflow-hidden w-full">
      <div class="md:flex hidden absolute -translate-y-1/2 top-1/2 bg-backgroundLight/80 dark:bg-backgroundDark/80 h-full md:w-[40%] left-0 justiy-center container">
        <div class="flex flex-col justify-center container">
          <div class="">
            <h1 class="logo text-3xl">Silace :<h2>Si Lapor Cepat</h2></h1>
          </div>
          <div class="pt-[16px] py-[24px]">
            <p>Satu Platform untuk Ribuan Cerita, Masalah, Aduan dan Solusi.</p>
          </div>
          <div class="flex flex-row gap-4">
            <a href="/#laporan">
              <x-primary-button> 
                {{ __('Lapor Sekarang') }}
              </x-primary-button>
            </a>
            @guest
              <a href="/register">
                <x-secondary-button>
                  {{ __('Daftar') }}
                </x-secondary-button>
              </a>
            @endguest 
            @auth
              <a href="/dashboard">
              <x-secondary-button id="cek">
                {{ __('Cek Laporan') }}
              </x-secondary-button>
            </a>
            @endauth
          </div>
        </div>
      </div>
      <div class="md:max-h-[600px] md:max-w-[600px] max-h-[300px] max-w-[300px] relative z-10 md:absolute md:right-6 md:-bottom-20">
        <div class="absolute -translate-y-1/2 -translate-x-1/2 top-3/4 left-1/2 flex flex-col gap-6">
          <div class="w-[220px] h-[220px] md:w-[320px] md:h-[320px] bg-backgroundLight/15 dark:bg-backgroundDark/15 flex rounded-full"></div>
        </div>
        <div class="absolute -translate-y-1/2 -translate-x-1/2 top-3/4 left-1/2 flex flex-col gap-6">
          <div class="w-[300px] h-[300px] md:w-[400px] md:h-[400px] bg-backgroundLight/15 dark:bg-backgroundDark/15 flex rounded-full"></div>
        </div>
        <div class="absolute md:top-0 md:left-0 top-2 left-2 flex flex-col gap-6">
          <p class="layer1 text-center skew-y-6 py-1 px-3 rounded-full shadow-md origin-bottom-left -rotate-12 md:text-xl">Cepat</p>
          <p class="layer1 text-center -skew-y-6 py-1 px-3 rounded-full shadow-md origin-bottom-right rotate-12 md:text-xl">Singkat</p>
          <p class="layer1 text-center skew-y-4 py-1 px-3 rounded-full shadow-md origin-bottom-left -rotate-6 md:text-xl">Tepat</p>
        </div>
        <img src="{{ url('/images/HeroImage.png') }}" alt="" class="w-[90dvw] md:w-[140dvw] object-fill drop-shadow-md">
      </div>
    </div>
    <div class="md:hidden layer1 rounded-[40px] h-auto flex flex-col items-center text-center justify-evenly -mt-[42px] shadow-md gapy relative z-10">
      <div class="">
        <h1 class="text-primary dark:text-primary logo">Silace :<h2>Si Lapor Cepat</h2></h1>
      </div>
      <div class="pt-[16px] py-[24px]">
        <p>Satu Platform untuk Ribuan Cerita, Masalah, Aduan dan Solusi.</p>
      </div>
      <div class="flex flex-row gap-4">
        <a href="/#laporan">
          <x-primary-button> 
            {{ __('Lapor Sekarang') }}
          </x-primary-button>
        </a>
        @guest
          <a href="/register">
            <x-secondary-button>
              {{ __('Daftar') }}
            </x-secondary-button>
          </a>
        @endguest 
        @auth
          <a href="/dashboard">
          <x-secondary-button id="cek">
            {{ __('Cek Laporan') }}
          </x-secondary-button>
        </a>
        @endauth
      </div>
      <div class="gapy">
        <x-stars>
        </x-stars>
      </div>
      <div id="TutorialStart" class="pb-4">
        <h1 class="text-primary dark:text-primary pb-6">Bagaimana Cara Kerja Silace?</h1>
        <x-primary-button onclick="introJs().start();">
          {{ __('Tutorial') }}
        </x-primary-button>
      </div>
    </div>
  </div>
</section>

<section id="caraKerja" class="background pt-[8dvh] pb-[2dvh] md:pb-[4dvh] relative rounded-b-[40px] z-20">
  <div class="flex flex-col md:grid md:grid-cols-3 md:gap-x-6 gap-y-[8dvh] container">
    <div class="layer2 flex flex-col items-center text-center rounded-[40px] h-auto gapy justify-evenly container  shadow-md" >
      <div class="h-[60px] w-[60px] bg-primary -mt-[60px] rounded-[10px] shadow-md">
        <div class="w-full h-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
          </svg>
        </div>
      </div>
      <h1 class="text-primary dark:text-primary py-4">Isi Laporan</h1>
      <p>Kamu akan mulai dengan mengisi laporan, mulai dari judul laporan, jenis laporan hingga lokasi kejadian. <br><br> Kamu juga bisa memilih apakah laporan ini bersifat publik atau privat. Jika publik, laporanmu akan muncul di website dan bisa dilihat oleh semua orang. Jika privat, hanya kamu dan admin yang bisa melihatnya.</p>
    </div>
    <div class="layer2 flex flex-col items-center text-center rounded-[40px] h-auto gapy justify-evenly  container shadow-md">
      <div class="h-[60px] w-[60px] bg-primary -mt-[60px] rounded-[10px] shadow-md">
        <div class="w-full h-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
          </svg>
        </div>
      </div>
      <h1 class="text-primary dark:text-primary py-4">Verifikasi Laporan</h1>
      <p>Setelah kamu mengirimkan laporan, admin kami akan memverifikasi untuk memastikan bahwa laporan tersebut valid dan bisa dipertanggungjawabkan. <br><br> Jika sudah lolos verifikasi, laporanmu akan disalurkan ke pihak berwenang atau bisa juga kamu share ke media sosial.</p>
    </div>
    <div class="layer2 flex flex-col items-center text-center rounded-[40px] h-auto gapy justify-evenly container  shadow-md">
      <div class="h-[60px] w-[60px] bg-primary -mt-[60px] rounded-[10px] shadow-md">
        <div class="w-full h-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-send-check-fill " viewBox="0 0 16 16">
            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
          </svg>
        </div>
      </div>
      <h1 class="text-primary dark:text-primary py-4">Proses Laporan</h1>
      <p>Laporan yang sudah diverifikasi akan diproses lebih lanjut. Setelah masalah selesai ditangani, laporan akan ditampilkan di website sebagai laporan yang telah selesai diproses. <br><br> Kamu bisa memantau status laporanmu sepanjang proses ini.</p>
    </div>
  </div>
</section>


<section id="laporan" class="bg-primary h-auto pt-[20px] relative z-10 -mt-[40px] rounded-b-[40px] ">
  <div class="container">
    <div class="pt-[40px] flex justify-center items-center">
      <x-stars-w></x-stars-w>
    </div>
    <div class="text-center  pb-[20px]">
      <h1 class="text-white dark:text-white" data-title="Buat Laporan" data-intro="Mari buat laporanmu sekarang! Jangan lupa isi data sesuai dengan fakta ya." data-step="6">Buat Laporan</h1>
      <p class="text-white dark:text-white">Adukan keluhanmu disini!</p>
    </div>
    <section id="form" class="">
      <div class="layer2 rounded-t-[40px] h-auto flex flex-col items-center text-center justify-evenly  gapy">
      @guest
        {{-- kalo disini, pas baru klik form langsung ke login/register --}}
          <a href="/login">
            @include('partials.postcreate')</a>
      @endguest
      @auth
        @include('partials.postcreate')    
      @endauth
      </div>
    </section>
  </div>
</section>

<section id="aduan" class="background h-auto relative -mt-[40px] z-0">
  <div class="w-full container">
    <div class="layer2 rounded-b-[40px] h-auto  shadow-md">
      <div class="pt-[20px] flex justify-center items-center">
        <x-stars></x-stars>
      </div>
      <div class="text-center  pb-[20px]">
        <h1 class="text-primary dark:text-primary">Laporan-laporan</h1>
        <p class="text-primary dark:text-primary">Bantu sebarkan laporan orang lain!</p>
      </div>
    </div>

    
    @if($posts->count())
    <div class="flex flex-wrap justify-center justify-items-center gapy gap-[20px] w-full">
      <a href="/posts/{{ $posts[0]->slug }}" class="w-full flex flex-col justify-between layer2 rounded-[40px] h-auto shadow-md  group  py-[20px] relative">
        <div id="postcat" class="absolute -top-2 -right-2 py-1.5 px-4 rounded-[10px] bg-primary shadow-md">
          <h2 class="text-sm text-white">{{ $posts[0]->category->name }}</h2>
        </div>
        <div id="imgpost" class="w-full rounded-[30px] h-[40dvh] overflow-hidden items-center justify-center shadow-md" >
          @if($posts[0]->images)
          <img src="{{ asset('storage/' . $posts[0]->images[0]) }}" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
          @else
          <img src="https://source.unsplash.com/featured/?nature,water" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
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
      <div class="flex flex-col md:grid grid-cols-3 gap-4 mx-[12.5px] w-full">
        @foreach ($posts->skip(1)->slice(0,3) as $post)
        <a href="/posts/{{ $post->slug }}" class="w-full flex flex-row justify-start layer2 rounded-[40px] h-[24dvh] shadow-md  group  gapy relative md:p-3">
          <div id="postcat" class="absolute -top-3 -right-2 py-1.5 px-4 rounded-[10px] bg-primary shadow-md">
            <h2 class="text-sm text-white">{{ $post->category->name }}</h2>
          </div>
          <div id="imgpost" class="w-1/3 rounded-[30px] overflow-hidden items-center justify-center shadow-md">
            @if($post->images)
            <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="h-full w-full object-cover flex">
            @else
            <img src="https://source.unsplash.com/featured/?nature,water" alt="{{ $posts[0]->title }}" class="h-full w-full object-cover flex">
            @endif
          </div>
          <div class="px-3 w-2/3">
            <div class="text-left">
              <p class="text-black/60 dark:text-white/60 pb-1 text-sm">{{ $post->region->kecamatan }}, {{ $post->region->wilayah }} | Status: {{ $post->status->name }}</p>
              <h2 class="text-primary dark:text-primary pb-1">{!! Str::limit($post->title, 40) !!}</h2>
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

    <div class="layer2 rounded-t-[40px] h-auto pb-[8dvh] container  shadow-md">
      <div class="text-center text-primary dark:text-primary gapy flex flex-col gap-[20px]">
        <a href="/laporan">
          <x-primary-button>{{ __('Lihat Aduan Lainnya') }}</x-primary-button></a>
        <a href="/#laporan" ><x-secondary-button>{{ __('Buat Laporan') }}</x-secondary-button></a>
      </div>
    </div>

  </div>
</section>
</x-guest-layout>