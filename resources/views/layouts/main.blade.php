<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="public/css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="icon" href="{{ url('/images/Favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display:none
    }
  </style>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>
    {{ $title }}</title>
  </head>
  <body>
    

    {{-- Navbar Starts --}}
    @include('partials.navbar')
    {{-- Navbar Ends --}}

    {{-- Section Starts --}}
    <section class="overflow-hidden pt-[60px]">
      @yield('container')
    </section>  
    {{-- Section Ends --}}
    
    <!-- scripts starts -->
    <script src="/js/script.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-as-nav-for@3/as-nav-for.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        AOS.init();
      </script>
    <!-- scripts ends -->
  </body>

  @include('partials.footer')
</html>
