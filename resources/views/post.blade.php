@extends('layouts.main')
@section('container')

<section id="post" class="background z-30 relative h-auto">

    <div class="h-auto">
      <div class="carousel rounded-b-[40px] overflow-hidden h-[40dvh] shadow-md" data-flickity='{ "autoPlay": true, "adaptiveHeight": true, "selectedAttraction": 0.01, "friction": 0.15, "pageDots" : false, "pauseAutoPlayOnHover" : false, "imagesLoaded" : true, "initialIndex" : 1 }'>
        @if($post->images)
        @foreach($post->images as $image)
        <div class="h-[40dvh] w-full">
          <img src="{{ asset('storage/' . $image) }}" alt="" class="h-full w-full object-cover flex">
        </div>
        @endforeach
        @else
        <div class="h-[40dvh] w-full">
          <img src="https://source.unsplash.com/800x800/?violet" alt="" class="h-full w-full object-cover flex">
        </div>
        <div class="h-[40dvh] w-full">
          <img src="https://source.unsplash.com/800x800/?purple" alt="" class="h-full w-full object-cover flex">
        </div>
        <div class="h-[40dvh] w-full">
          <img src="https://source.unsplash.com/800x800/?flowers" alt="" class="h-full w-full object-cover flex">
        </div>
        @endif
      </div>
      <div class="absolute top-0 right-0">
        <div class="p-3 layer2 shadow-md rounded-bl-[20px]">
          <h2 class="text-sm">{{ $post->status->name }}</h2>
        </div>
      </div>
      <div class="layer1 h-auto rounded-t-[40px] container flex flex-col items-center text-center justify-evenly -mt-[8dvh] shadow-md gapy relative z-10 gap-y-2">
        <div class="">
          <h1 class="text-primary dark:text-primary">{{ $post->title }}</h2></h1>
        </div>
        <div class="">
          <p>{{ $post->category->name }} di {{ $post->region->kecamatan }}, {{ $post->region->wilayah }}</p>
        </div>
        <div>
          <x-stars></x-stars>
        </div>
        <div class="text-justify pb-[8dvh]">
          <trix-editor>
            <p>{!! $post->body !!}</p>
          </trix-editor>
        </div>
      </div>
    </div>
  </section>


@endsection