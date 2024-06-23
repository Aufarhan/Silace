<x-app-layout>
   <div class="background pb-[8dvh] relative">
      <div class="overflow-hidden pb-[30px]">
         <div class="pb-2 pt-[14dvh] text-center">
            <h1 class="">Laporanmu</h1>
            <p class=" pt-2">Lihat, Edit dan Hapus laporanmu disini.</p>
         </div>
         <div class="gapy container">
            @include('partials.searchbar')
          </div>

         <div class="mb-4">
            <form action="{{ route('dashboard.posts.index') }}" method="GET">
               
               <div class="carousel px-4 py-2" data-flickity='{ "freeScroll": true, "contain": true, "pageDots": false }'>
                  <button class="py-2 px-0.5 mr-2" value="">
                      <div class="carousel-cell rounded-lg ring-2 ring-primary px-2 py-2">Semua</div>
                  </button>
                  @foreach ($statuses as $status)
                  <button class="py-2 px-0.5 mr-2"  name="status" value="{{ $status->id }}">
                      <div class="carousel-cell rounded-lg ring-2 ring-primary px-2 py-2">{{ $status->name }}</div>
                  </button>
                  @endforeach
              </div>
            </form>
         </div>
         @if($posts->count() > 0)

         <!-- Dropdown untuk memilih status laporan -->

         <!-- Daftar laporan pengguna -->
         <div class="grid grid-cols-1 container gap-6">
            @foreach ($posts as $post)
            <div class="relative">
               <div class="layer1 shadow-lg rounded-md truncate h-auto flex flex-col gap-2 p-3 relative">
                  <div class="flex flex-row justify-center gap-2 absolute w-full p-2 top-0 left-0
                     @if ($post->status_id == 1)
                        bg-green-600
                     @elseif ($post->status_id == 2 || $post->status_id == 5)
                        bg-red-600 
                     @elseif ($post->status_id == 3 || $post->status_id == 6)
                        bg-blue-600 
                     @elseif ($post->status_id == 4 || $post->status_id == 7)
                        bg-violet-600 
                     @endif">
                     <p class="text-xs font-medium text-center text-white dark:text-white">{{ $post->status->name }}</p>
                  </div>
                  <div class="pt-8 text-left flex flex-col">
                     <p class="text-sm">Judul</p>
                     <h3>{!! Str::limit($post->title, 35) !!}</h3>
                     <p class="text-sm pt-2">Jenis Laporan</p>
                     <h3>{{ $post->category->name }}</h3>
                     <p class="text-sm pt-2">Diunggah pada</p>
                     <h3>{{ $post->created_at}}</h3>
                     @if ($post->komentar)
                     <p class="text-sm pt-2">Komentar Admin</p>
                     <h3>{{ $post->komentar}}</h3>
                     @endif
                  </div>
               </div>
               <div class="grid grid-cols-3 gap-1 justify-between">
                  <a href="/posts/{{ $post->slug }}/show">
                     <div class="bg-primary text-white dark:text-white dark:bg-primary  w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                        <p class="text-sm">Lihat</p>
                     </div>
                  </a>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit">
                     <div class="bg-primary text-white dark:text-white dark:bg-primary  w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                        <p class="text-sm">Edit</p>
                     </div>
                  </a>
                  <a href="{{ route('posts.destroy', $post->slug) }}" data-confirm-delete="true">
                     <div class="bg-red-500 text-white dark:text-white dark:bg-red-500  w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                        <p class="text-sm">Hapus</p>
                     </div>
                  </a>
               </div>
            </div>
            @endforeach
         </div>
         {{-- <table class="layer2 ring-1 ring-slate-400 rounded-[20px] py-8 overflow-x-auto container shadow-md overflow-hidden">
            <thead class="">
               <tr>
                  <th scope="col" class="p-3 text-center  uppercase tracking-wider">
                     <p class="">No.</p>
                  </th>
                  <th scope="col" class="p-4 text-left  uppercase tracking-wider">
                     <p>Judul Laporan</p>
                  </th>
               </tr>
            </thead>
            <tbody class="background rounded-[20px]">
               @foreach ($posts->sortByDesc('updated_at') as $post)
               <tr>
                  <td class="p-4 whitespace-nowrap ">
                     <h2 class="text-center bg-slate-300 dark:bg-slate-700 rounded-md py-3 px-2">{{ $loop->iteration }}</h2> 
                  </td>
                  <td class="p-4 whitespace-nowrap text-left ">
                     <h2 class="">{{ $post->title }}</h1>
                  </td>
                  <tr class="border-b-2 border-slate-400 dark:border-slate-400 rounded">
                     <td class="p-4 whitespace-nowrap text-sm">
                        <div class="flex flex-col gap-y-3 justify-between items-center text-center">
                           <div class="bg-slate-300 dark:bg-slate-700 rounded-md p-1 h-full w-full">
                              <a href="/posts/{{ $post->slug }}" class="text-center flex flex-col items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                 </svg>
                                 Lihat                          
                                 </a>
                           </div>
                           <div class="bg-slate-300 dark:bg-slate-700 rounded-md p-1 h-full w-full">
                              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-center flex flex-col items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                 <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                 </svg>
                                 Edit                                     
                              </a>
                           </div>
                           <div class="bg-slate-300 dark:bg-slate-700 rounded-md p-1 w-full h-full flex items-center justify-center">
                              <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                 @method('delete')
                                 @csrf
                                 <button onclick="return confirm('Are you sure?')" class="text-center flex flex-col items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                 Hapus
                              </button>
                              </form>
                           </div>
                        </div>
                     </td>
                     <td class="p-4 gap-2 whitespace-nowrap text-left  flex flex-col items-start justify-center">
                        <div>
                           <p>{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <div>
                           <p>
                              Jenis Aduan:   
                           </p>
                           <p>{{ $post->category->name }}</p>
                        </div>
                        <div>
                           <p>
                              Status Aduan:   
                           </p>
                           <p>{{ $post->status->name }}</p>
                        </div>
                     </td>
                  </tr>
               </tr>
               @endforeach
            </tbody>
         </table> --}}
         @include('partials.pagination')

         @else
            <p class="text-center">Tidak ada laporan, <a class="text-primary dark:text-primary" href="/#laporan">Buat sekarang</a></p>
         @endif
      </div>
   </div>
</x-app-layout>
