@if ($paginator->hasPages())
<div class="flex flex-row gap-x-3 justify-items-center p-2 w-full justify-between rounded-[15px] bg-primary dark:bg-primary shadow-md">
    <div class="flex items-center mx-[2dvh]">
        @if ($paginator->onFirstPage())
            <div class=""><h2 class="dark:text-white text-white"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#ffffff70" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
              </svg></h2></div>
        @else
            <div class=""><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="dark:text-white text-white"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#fff" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
              </svg></a></div>
        @endif
    </div>
    <div class="flex flex-row gap-x-4 items-center">
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="disabled"><h2>{{ $element }}</h2></div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class=""><h2 class="text-white/70 dark:text-white/70 text-sm">{{ $page }}</h2></div>
                    @else
                        <a href="{{ $url }}" class=""><h2 class="text-white dark:text-white text-sm">{{ $page }}</h2></a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
    <div class="flex items-center mx-[2dvh]">
        @if ($paginator->hasMorePages())
            <div><a href="{{ $paginator->nextPageUrl() }}" class="dark:text-white text-white" rel="next"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#fff" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg></a></div>
        @else
            <div class="dark:text-white text-white"><h2><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#ffffff70" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg></h2></div>
        @endif
    </div>
</div>
@endif 