@if ($posts->count() != 1 )
<div class="flex flex-col justify-center h-auto items-center w-full">
  <div class="flex gapy ">
  {{ $posts->links('pagination.custom') }}  
  </div>
  <div class="flex justify-center items-center"><p>Menampilkan {{($posts->currentpage()-1)*$posts->perpage()+1}}-{{$posts->currentpage()*$posts->perpage()}} dari  {{$posts->total()}} {{ $title }}</p>
  </div>
</div>
@else
@endif