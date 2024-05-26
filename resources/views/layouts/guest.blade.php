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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="stylesheet" href="https://unpkg.com/intro.js/introjs.css">
    <!-- Add Nazanin template -->
    <link href="https://unpkg.com/intro.js/themes/introjs-modern.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="/js/script.js"></script>
        <script src="/js/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/flickity-as-nav-for@3/as-nav-for.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/intro.js/intro.js"></script>
        <script>
            AOS.init();
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="layer1 dark:bg-gray-800 shadow relative">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            @if (Request::is(['login','register','reset-password','verify-email','forgot-password','confirm-password']))
            <div class="pt-[20dvh] min-h-screen flex flex-col sm:justify-center items-center sm:pt-[20dvh] bg-gray-100 dark:bg-gray-900">
                <div>
                    <a wire:navigate href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
    
                <div class=" w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
            @else            
            <main class="overflow-hidden pt-[60px]">
                {{ $slot }}
            </main>
            @endif

        </div>
        @include('partials.footer')
    </body>
</html>
