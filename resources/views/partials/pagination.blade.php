@if ($posts->count() >= 1 )
<div class="flex flex-col justify-center py-4 h-auto items-center">
  <div class="flex">
  {{ $posts->links('pagination.custom') }}  
  </div>
  <div class="flex justify-center items-center mt-2"><p>Menampilkan {{($posts->currentpage()-1)*$posts->perpage()+1}}-{{$posts->currentpage()*$posts->perpage()}} dari  {{$posts->total()}} {{ $title }}</p>
  </div>
</div>
@else
@endif