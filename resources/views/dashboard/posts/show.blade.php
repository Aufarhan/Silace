@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="justify-center">
        <div>
                <div class="flex pt-8">
                    <a href="/dashboard/posts" class="flex text-white bg-blue-500 px-2 py-2 text-center rounded"><span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-blue-500 rounded-sm">
                        <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                        </svg>
                        </span>Back to my posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="flex text-white bg-orange-500 px-2 py-2 text-center rounded mx-1"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-orange-500 rounded-sm py-1 mx-1">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg>
                        </span>Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="flex text-white bg-red-500 px-2 py-2 text-center rounded"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 bg-red-500 rounded-sm py-1">
                               <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                             </svg>Delete</button>
                    </form>
                </div>
                
                <div class="md:container md:p-0 md:mx-auto mx-2 md:h-auto">
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 md:pt-12 md:pb-4 pb-4 pt-8  ">
                      <div id="postArtikel" class="flex items-center">
                        <div>
                          <div class="md:text-lg text-sm">{{ $post->created_at->diffForHumans() }}</div>
                          <h1 class="text-2xl md:text-5xl font-extrabold tracking-wide   line-clamp-[10]">{{ $post->title }}</h1>
                          <div class="flex flex-row items-center">
                            <div>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                              </svg>
                            </div>
                            <div class="px-2 py-2">
                              <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none font-bold text-primary dark:text-primary">{{ $post->author->name }}</a> di kategori <a class="font-bold text-primary dark:text-primary" href="/laporan?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="postGambar">
                        <div class="carousel carousel-main overflow-hidden rounded-[1rem]" data-flickity='{ "adaptiveHeight": true, "fade": true, "imagesLoaded": true, "autoPlay": 2000, "pauseAutoPlayOnHover": false }'>
                          @foreach($post->images as $image)
                          <div class="carousel-post max-h-[40dvh] flex items-center ">
                            <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                              class="carousel-post-image rounded-[1rem]" >
                          </div>
                          @endforeach
                        </div>
                        <div class="carousel carousel-nav overflow-hidden pt-2" data-flickity='{"asNavFor": ".carousel-main", "contain": true, "pageDots": false}'>
                          @foreach($post->images as $image)
                          <div class="carousel-post">
                            <img src="{{ asset('/storage/' . $image) }}" alt="multiple image"
                              class="carousel-post-image rounded-[1rem]">
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <section class="md:container md:p-0 md:mx-auto mx-2 pb-6  ">
                    <div class="mx-2">
                      <div class="container text-base tracking-normal font-medium text-hitam text-left">
                        {!! $post->body !!}
                      </div>
                    </div>
                  </section>
        </div>
    </div>
</div>
@endsection