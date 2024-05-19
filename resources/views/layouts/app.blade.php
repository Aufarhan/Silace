<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="layer1 dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            
            <main>
               <x-notification></x-notification>
               <div class="flex flex-row">
                  <div class="grid grid-cols-1 gap-4 w-full container gapsec">
                     <div>
                        <h2 class="text-center">Laporan yang telah kamu adukan</h2>
                     </div>
                     <div class="layer1 shadow rounded-t-lg border-b p-4">
                        <div class="flex flex-col">
                           <div class="overflow-x-auto rounded-[1rem]">
                              <div class="align-middle inline-block min-w-full">
                                 <div class="shadow overflow-hidden sm:rounded-[1rem]">
                                    <table class="min-w-full divide-y divide-gray-200">
                                       <thead>
                                          <tr>
                                             <th scope="col" class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No.
                                             </th>
                                             <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Judul
                                             </th>
                                             <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Jenis Aduan
                                             </th>
                                             <th scope="col" class="p-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                             </th>
                                             <th scope="col" class="p-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                             </th>
                                          </tr>
                                       </thead>
                                       @if($posts->count())
                                       <tbody class="layer1 divide-y divide-gray-200">
                                          @foreach ($posts->reverse() as $post)
                                          <tr>
                                             <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                {{ $loop->iteration }}
                                             </td>
                                             <td class="p-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                                {{ $post->title }}
                                             </td>
                                             <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                {{ $post->category->name }}
                                             </td>
                                             @if ($post->status->name == "Publik")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-blue-200 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Dalam Verifikasi")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-yellow-200 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Sedang Diproses")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-purple-200 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Laporan Selesai")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-green-300 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Privasi")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-blue-200 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Sedang Diproses (Private)")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-purple-200 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             @if ($post->status->name == "Laporan Selesai (Private)")
                                             <td class="p-4 whitespace-nowrap ">
                                                <h2 class="text-sm font-normal text-backgroundDark rounded-md bg-green-300 text-center">
                                                   {{ $post->status->name }}
                                                </h2>
                                                
                                             </td>
                                             @endif
                                             <td class="p-4 flex whitespace-nowrap text-white">
                                                <a href="/dashboard/posts/{{ $post->slug }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-blue-500 rounded-sm py-1">
                                                   <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                   <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                                </svg>                                                                        
                                                </a>
                                                <a href="/dashboard/posts/{{ $post->slug }}/edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-orange-500 rounded-sm py-1 mx-1">
                                                   <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                   <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>                                     
                                                </a>
                                                   <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                                      @method('delete')
                                                      @csrf
                                                      <button onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-red-500 rounded-sm py-1">
                                                         <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                                      </svg></button>
                                                   </form>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                       @endif
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
        </div>
    </body>
</html>
