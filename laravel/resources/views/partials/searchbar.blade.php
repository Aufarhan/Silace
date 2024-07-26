<div class="">
    <form action="/{{$search}}">    
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <label for="default-search" class="mb-2 text-sm  text-hitam sr-only ">Search</label>
      <div class="relative">
          <input type="search" id="default-search" name="search" class="block p-4 pl-4 w-full text-sm layer1 rounded-[1rem]  focus:ring-primary focus:border-primary " 
          placeholder="Cari Laporan.." value="{{ request('search') }}">
          <button type="submit" class="absolute inset-y-0 right-0 bg-primary w-[15dvw] rounded-r-[1rem] text-white">
              Cari</button>
      </div>
    </form>
</div>