<nav x-data="{ open: false }" class="bg-layerLight/90 dark:bg-layerDark/90 backdrop-blur-sm border-b border-gray-300 dark:border-gray-900 shadow-sm fixed w-full top-0 z-[99] h-auto">
    <!-- Primary Navigation Menu -->
    <div class="layer2 border-b border-gray-300 dark:border-gray-900 shadow-sm">
        <div class="flex justify-between h-[60px] relative px-4">
            <x-notification></x-notification>
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Left Navigation -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="('/')" :active="request()->routeIs('home')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="('/laporan')" :active="request()->routeIs('laporan')">
                        {{ __('Laporan') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Navigation -->
            <div class="space-x-8 sm:-my-px sm:ms-10 flex">
                <div class="hidden sm:flex space-x-8">
                    @auth
                    <x-nav-link :href="('/dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Cek Laporanmu') }}
                    </x-nav-link>
                    <x-nav-link :href="('/profile')" :active="request()->routeIs('profile.edit')">
                        {{ __('Edit Profile') }}
                    </x-nav-link>
                    @endauth
                    @guest
                    <x-nav-link :href="('/dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Masuk') }}
                    </x-nav-link>
                    @endguest
                    <x-nav-link :href="('/#laporan')" class="bg-primary dark:bg-primary px-4">
                    <p class="uppercase text-white dark:text-white">{{ __('Buat Laporan') }}</p>
                    </x-nav-link>
                    @auth
                    <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center">
                        @csrf
                        <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <p class="uppercase text-red-500 dark:text-red-400">{{ __('Log Out') }}</p>
                        </x-nav-link>
                    </form>
                    @endauth
                </div>
                <div class="flex items-center justify-center space-x-2">
                    <x-darkmode></x-darkmode>
                        <div class="sm:hidden">
                            <!-- Hamburger -->
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out" data-title="3. Laporan Terkirim" data-intro="Jika laporan sudah valid, maka akan tersimpan di dashboardmu." data-step="3">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden h-auto flex flex-col w-full  justify-center text-center py-8">
        <div class="space-y-2 flex flex-col items-center w-full justify-center">                
            <x-dropdown align="right" width="48">       
                <x-slot name="trigger">
                    @auth
                    <div class="flex flex-col pb-4 border-b border-gray-500 dark:border-gray-200 px-4 gap-y-2 items-center justify-center text-center">
                        <div class="w-20 h-20 rounded-full overflow-hidden flex justify-center items-center text-center shadow-md">
                            <img src="https://source.unsplash.com/500x500?purple" alt="" class="w-full h-full object-fill flex items-center justify-center">
                        </div>
                        <p class="text-center font-semibold pt-2">{{ Auth::user()->name }}</p>
                        <p class="text-center">{{ Auth::user()->email }}</p>
                        <p class="text-center font-semibold text-primary dark:text-primary">{{ __('Dashboard') }}</p>
                    </div>
                    @endauth
                </x-slot>
                                        

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        <p> {{ __('Edit Profil') }}</p>
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('dashboard')">
                        <p>{{ __('Cek Laporanmu') }}</p>
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <p class="uppercase text-red-500 dark:text-red-500 font-semibold">{{ __('Log Out') }}</p>
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            <x-responsive-nav-link :href="('/')" :active="request()->routeIs('home')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="('/laporan')" :active="request()->routeIs('laporan')">
                {{ __('Laporan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="('/#laporan')" >
                <p class="uppercase text-primary dark:text-primary font-semibold">{{ __('Buat Laporan') }}</p>
            </x-responsive-nav-link>
            @guest
            <x-responsive-nav-link :href="('/login')" >
                <p class="uppercase text-primary dark:text-primary font-semibold">{{ __('Masuk / Daftar') }}</p>
            </x-responsive-nav-link>       
            @endguest
        </div>
    </div>
</nav>
