<x-app-layout>
   <div class="background">
      <div class="pt-[14dvh] relative">
         <div class="container background flex flex-row pb-[10dvh]">
            <h2 class="container">Hai, {{ Auth::user()->name }}</h2>
         </div>
         <div class="bg-primary pt-[5dvh] rounded-t-[40px] -mt-[5dvh] pb-[10dvh]">
            <div class="grid grid-cols-3 container gap-4">
               @if(Auth::user()->is_admin)
               <div class="h-[15dvh] layer1 rounded-md p-3">
                  <h1>{{ $verifReportsCount }}</h1>
                  <p class="text-xs pt-1">Belum Diverifikasi</p>
               </div>
               <div class="h-[15dvh] layer1 rounded-md p-3">
                  <h1>{{ $privacyReportsCount }}</h1>
                  <p class="text-xs pt-1">Laporan Privasi</p>
               </div>
               <div class="h-[15dvh] layer1 rounded-md p-3">
                  <h1>{{ $finishedReportsCount }}</h1>
                  <p class="text-xs pt-1">Laporan Selesai</p>
               </div>
               @endif
               <div class="h-[15dvh] layer1 rounded-md p-3">
                  <h1>@if(Auth::user()->is_admin)
                     {{ $allUserReportsCount }}@else{{ $userReportsCount }}@endif</h1>
                  <p class="text-xs pt-1">Laporan Dibuat</p>
               </div>
               <div class="h-[15dvh]  layer1 rounded-md p-3">
                  <h1>@if(Auth::user()->is_admin)
                     {{ $allAcceptedReportsCount }}@else{{ $acceptedReportsCount }}@endif</h1>
                  <p class="text-xs pt-1">Laporan Diterima</p>
               </div>
               <div class="h-[15dvh] layer1 rounded-md p-3">
                  <h1>@if(Auth::user()->is_admin)
                     {{ $allInProgressReportsCount }}@else{{ $inProgressReportsCount }}@endif</h1>
                  <p class="text-xs pt-1">Laporan Diproses</p>
               </div>
            </div>
         </div>
         <div class="layer2 pt-[5dvh] rounded-t-[40px] -mt-[5dvh] pb-[10dvh]">
            <div class="grid grid-cols-2 gap-8 container">
               @if(Auth::user()->is_admin)
               <a href="/dashboard/verifikasi">
                  <div class="h-[15dvh] flex flex-col p-3 shadow-md rounded-md items-center justify-between">
                     <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
                      </svg>
                     <p class="text-xs pt-1">Verifikasi Laporan</p>
                  </div>
                  </a>
                  <a href="/dashboard/proses">
                     <div class="h-[15dvh] flex flex-col p-3 shadow-md rounded-md items-center justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                           <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
                         </svg>
                        <p class="text-xs pt-1">Proses Laporan</p>
                     </div>
                     </a>
               @else
               <a href="/#laporan">
               <div class="h-[15dvh] flex flex-col p-3 shadow-md rounded-md items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                     <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
                   </svg>
                  <p class="text-xs pt-1">Buat Laporan</p>
               </div>
               </a>
               @endif
               <a href="/dashboard/posts">
               <div class="h-[15dvh] flex flex-col p-3 shadow-md rounded-md items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                     <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                     <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
                   </svg>
                  <p class="text-xs pt-1">Lihat Laporan</p>
               </div>
               </a>
               <a href="/profile">
               <div class="h-[15dvh] flex flex-col p-3 shadow-md rounded-md items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                     <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                   </svg>
                  <p class="text-xs pt-1">Profile</p>
               </div>
               </a>
                  <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center">
                     @csrf
                     <a href="route('logout')" class="h-[15dvh] w-full flex flex-col p-3 shadow-md rounded-md items-center justify-between text-red-500 dark:text-red-500" 
                           onclick="event.preventDefault();
                                       this.closest('form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                           <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
                           </svg>
                        <p class="text-xs pt-1 font-bold">Log Out</p>
                     </a>
               </form>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
