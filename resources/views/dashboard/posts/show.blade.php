<x-guest-layout>
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
          <img src="https://source.unsplash.com/800x800/?water" alt="" class="h-full w-full object-cover flex">
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
      <div class="layer1 h-auto rounded-t-[40px] container flex flex-col  justify-evenly -mt-[8dvh] shadow-md gapy relative z-10 gap-y-2">
        <div class="text-center">
          <h1 class="text-primary dark:text-primary">{{ $post->title }}</h2></h1>
        </div>
        <div class="text-center">
          <p>{{ $post->category->name }} di {{ $post->region->kecamatan }}, {{ $post->region->wilayah }}</p>
        </div>
        <div class="text-center items-center justify-evenly">
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

@push('stylesheets')
<style>
  .share-button {
      display: inline-block;
      margin-right: 10px;
      padding: 10px;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
  }
  .share-button i {
      margin-right: 5px;
  }
</style>
<link rel="stylesheet" href="/css/share-buttons.css">
@endpush

@push('scripts')
<script src="/js/share-buttons.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="/js/share-buttons.jquery.js"></script>
@endpush

</x-guest-layout>