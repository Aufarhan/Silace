@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="flex bg-green-100 rounded-[1rem] p-4  text-sm text-green-700" role="alert">
    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div>
        <span class="font-medium">{{ session('success')}}</span><a href="/categories">, Check it out!</a>
    </div>
</div>
@endif

<div class="pt-6 px-4">
   <div class="w-full grid grid-cols-1">
      <div class="layer1 shadow rounded-[1rem] p-4 border-b">
         <div class="flex items-center justify-between mb-4">
            <div class="flex-shrink-0">
               <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Post Categories</span>
               <h3 class="text-base font-normal text-gray-500">Edit, upload, and publish post categories here.</h3>
            </div>
            <div class="flex">
               <a href="/dashboard/categories/create" class="flex text-white bg-blue-500 px-2 py-2 text-center rounded"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                  </svg>                
                  </span>Add new category</a>
            </div>
         </div>
      </div>
   </div>
</div>
<main>
   <div class="pt-6 px-4">
      <div class="w-full grid grid-cols-1 gap-4">
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
                                    Category Name
                                 </th>
                                 <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="layer1 divide-y divide-gray-200">
                              @foreach ($categories as $category)
                              <tr>
                                 <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{ $loop->iteration }}
                                 </td>
                                 <td class="p-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                    {{ $category->name }}
                                 </td>
                                 <td class="p-4 flex whitespace-nowrap text-white">
                                    <a href="/dashboard/categories/{{ $category->slug }}/edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-orange-500 rounded-sm py-1 mx-1">
                                       <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                       <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                     </svg>                                     
                                     </a>
                                       <form action="/dashboard/categories/{{ $category->slug }}" method="post">
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
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection