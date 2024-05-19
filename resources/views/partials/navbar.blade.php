

<nav class="">
  <div class="flex items-center justify-between px-[12px] layer2 border-b-2 border-gray-200 dark:border-layerDark fixed w-full top-0 z-[50] h-[60px] shadow-sm">
    <a href="/" class="flex items-center rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Silace</span>
    </a>
    <div class="flex items-center gap-x-4 justify-between md:order-2 md:space-x-0 rtl:space-x-reverse">
      <!-- Dark mode switcher -->
      <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
      </button>
      <!-- Dark mode switcher end --> 
      @auth
        <button type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
          </svg>
        </button>
      @endauth
      <button type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm" id="dropdown-button" aria-expanded="false" data-dropdown-toggle="dropdown" data-dropdown-placement="bottom">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square-fill" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6z"/>
        </svg>
      </button>
        <!-- Dropdown menu -->      
    </div>
  </div>
  
  @auth
  <div class="z-[40] hidden text-base list-none layer1 divide-y divide-gray-500 rounded-lg shadow " id="user-dropdown">
    <div class="px-4 py-3">
      <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
      <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
    </div>
    <ul class="py-2" aria-labelledby="user-menu-button">
      <li>
        <a href="/dashboard" class="rounded-md text-sm text-gray-700  dark:text-gray-200 dark:hover:text-white">Dashboard</a>
      </li>
      <li>
        <a href="/" class="rounded-md text-sm text-gray-700  dark:text-gray-200 dark:hover:text-white">Settings</a>
      </li>
      <li>
        <a href="/" class="rounded-md text-sm text-gray-700  dark:text-gray-200 dark:hover:text-white">Earnings</a>
      </li>
      <li>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="">
              <h1 class="rounded-md text-sm text-gray-700  dark:text-gray-200 dark:hover:text-white">Logout</h1>
          </button>
        </form>
      </li>
    </ul>
  </div> 
  @endauth 
  <div class="hidden pb-[4dvh] h-[100dvh] w-[64dvw] justify-end items-start z-[40] layer1 shadow-md  relative" id="dropdown">
      <div class="gapy w-full h-[84dvh] flex flex-col gap-y-2 container items-start justify-end" aria-labelledby="user-menu-button">
        <div>
          <a href="/about" class=""><h1>Dashboard</h1></a>
        </div>
        <div>
          <a href="/" class=""><h1>Settings</h1></a>
        </div>
        <div>
          <a href="/" class=""><h1>Earnings</h1></a>
        </div>
        <div class="pt-[24px]">
          <a href="/#laporan" class=""><h1 class="text-primary dark:text-primary">Buat Laporan</h1></a>
        </div>
        <div>
          <a href="/login" class=""><h1>Masuk</h1></a>
        </div>
      </div>
  </div>
</nav>
