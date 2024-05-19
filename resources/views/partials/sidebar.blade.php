{{-- Main Modal --}}
<div id="sidebar" tabindex="-1" data-modal-backdrop="static" data-modal-placement="top-right" aria-hidden="true" class="fixed top-0 left-0 right-0 -z-[1] hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full animate__fadeIn animate__animated">
    <div class="relative w-[90vw] max-w-md max-h-full overflow-x-hidden">
        <div class="py-6"></div>
        <!-- Modal content -->
        <div class="relative bg-navy h-screen shadow-lg shadow-hitam/10">
            <!-- Modal body -->
            <div class="p-6 overflow-x-hidden">
                <ul id="menu" class="my-4 space-y-3">
                    <li>
                        <a href="/" class="flex items-center justify-end text-right p-4  {{ ($title === "Silace" ? 'text-detail' : 'text-white')}}">
                            <h1 class="flex-1 whitespace-nowrap">Beranda</h1>
                        </a>
                    </li>
                    <li>
                        <a href="/program" class="flex items-center justify-end text-right p-4  {{ ($title === "Program" ? 'text-detail' : 'text-white')}}">
                            <h1 class="flex-1 whitespace-nowrap">Program</h1>
                        </a>
                    </li>
                    <li>
                        <a href="/aktivitas" class="flex items-center justify-end text-right p-4  {{ ($title === "Aktivitas" ? 'text-detail' : 'text-white')}}">
                            
                            <h1 class="flex-1 whitespace-nowrap">Aktivitas</h1>
                        </a>
                    </li>
                    <li>
                        <a href="/informasi" class="flex items-center justify-end text-right p-4  {{ ($title === "Informasi" ? 'text-detail' : 'text-white')}}">
                            <h1 class="flex-1 whitespace-nowrap">Informasi</h1>
                            
                        </a>
                    </li>
                    <li>
                        <a href="/laporan?category=laporan" class="flex items-center justify-end text-right p-4  {{ ($title === "laporan" ? 'text-detail' : 'text-white')}}">
                            
                            <h1 class="flex-1 whitespace-nowrap">laporan</h1>
                        </a>
                    </li>
                    {{-- @guest  
                    <li class="border-t-2 border-white">
                    <a href="/login" class="flex items-center p-3">
                        <h1 class="flex-1 whitespace-nowrap text-right text-white">Masuk</h1>
                    </a>
                    </li>
                    @endguest --}}
                    {{-- login start --}}
                    <li>
                        <a target="_blank" href="https://wa.me/6283136152521?text=Assalamu%27alaikum%20warahmatullahi%20wabarakatuh,%20Saya%20ingin%20bertanya%20mengenai%20sekolah%20Al%20Khoir" class="button1 flex items-center justify-end text-right p-4">
                        <h1>Daftar</h1>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="/dashboard" class="flex items-center p-3">
                            <h1 class="flex-1 whitespace-nowrap text-right text-white">Dashboard</h1>
                        </a>
                    </li>
                    @endauth
                    {{-- login end --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- Main Modal --}}