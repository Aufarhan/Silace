<aside id="sidebar" class="md:hidden fixed z-20 h-full top-0 right-0 mt-[10dvh] flex flex-shrink-0 flex-col w-[90vw] transition animate__fadeIn animate__animated" aria-label="Sidebar">
   <div class="relative flex-1 p-4 bg-navy divide-y space-y-1">
      <ul id="menu" class="space-y-2 pb-2">
         <li>
            <form action="#" method="GET" class="lg:hidden">
               <label for="mobile-search" class="sr-only">Search</label>
               <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                     <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                     </svg>
                  </div>
                  <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-[1rem] focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
               </div>
            </form>
         </li>
         <li>
            <a href="/dashboard" class="text-white rounded-[1rem] flex items-center p-2  group">
               <svg class="w-6 h-6 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                  <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
               </svg>
               <h1 class="ml-3 {{ Request::is('dashboard') ? 'text-gray-400' : '' }}">Dashboard</h1>
            </a>
         </li>
         <li>
            <a href="/dashboard/posts" class="text-white rounded-[1rem]  flex items-center p-2 group ">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>        
               <h1 class="ml-3 {{ Request::is('dashboard/posts*') ? 'text-gray-400' : '' }}">Posts</h1>
            </a>
         </li>
         <li class="border-t-2 border-third">
            <form action="/logout" method="post">
               @csrf
               <button type="submit" class="">
                  <h1 class="flex-1 text-2xl whitespace-nowrap text-right text-third">Logout</h1>
               </button>
            </form>
         </li>
         @can('admin')
         <li>
            <a href="/dashboard/categories" class="text-white rounded-[1rem] flex items-center p-2  group">
               <svg class="w-6 h-6 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                  <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
               </svg>
               <h1 class="ml-3 {{ Request::is('dashboard/categories*') ? 'text-gray-400' : '' }}">Post Categories</h1>
            </a>
         </li>
         @endcan
      </ul>
   </div>
</aside>