<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="public/css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="icon" href="{{ url('/images/LogoSilace.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <title>Silace | Dashboard</title>

  {{-- Trix Editor / Post --}}
  <script type="text/javascript" src="/js/trix.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display:none
    }
  </style>
  </head>
  <body>

    {{-- @include('dashboard.layouts.header')
    @include('dashboard.layouts.sidebarDB') --}}
    <div class="flex flex-row">
      <div id="sidebarPC" class="bg-secondary ring ring-secondary h-[100dvh] md:flex hidden w-[20vw] p-4">
        <ul>
          <li>
            <a href="/dashboard" class="button1">Dashboard</a>
          </li>
          <li>
            <a href="/dashboard/posts" class="button1">Posts</a>
          </li>
        </ul>
      </div>
      <div id="main-content" class="h-full w-full layer1 relative overflow-y-auto">
          <main>
            @yield('container')
          </main>
      </div>
    </div>
    <script async defer src="https://button1.github.io/button1.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>


    <!-- scripts starts -->
    <script src="/js/script.js"></script>
    <script src="/js/flickity.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        AOS.init();
      </script>
    <!-- scripts ends -->
  </body>


  
  <!-- footer starts -->
<footer>
</footer>
  <!-- footer ends -->
</html>
