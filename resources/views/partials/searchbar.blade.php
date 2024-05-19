<div class="md:container md:p-0 md:mx-auto mx-2 my-[2dvh]">
    <form action="/{{$search}}">    
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <label for="default-search" class="mb-2 text-sm  text-hitam sr-only ">Search</label>
      <div class="relative">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          </div>
          <input type="search" id="default-search" name="search" class="block p-4 pl-10 w-full text-sm text-hitam layer1 rounded-[1rem]  focus:ring-primary focus:border-primary " 
          placeholder="Telusuri.." value="{{ request('search') }}">
          <button type="submit" class="absolute inset-y-0 right-0 button1">
              Cari</button>
      </div>
    </form>
</div>