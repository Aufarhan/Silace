@extends('dashboard.layouts.main')
@section('container')

<div class="pt-6 px-4">
    <div class="w-full grid grid-cols-1">
       <div class="layer1 shadow rounded-[1rem] p-4 border-b">
          <div class="flex items-center justify-between mb-4">
             <div class="flex-shrink-0">
                <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Making Post</span>
                <h3 class="text-base font-normal text-gray-500">Edit, upload, and publish posts here.</h3>
             </div>
          </div>
       </div>
    </div>
 </div>

    <div class="pt-6 px-4">
        <div class="layer1 shadow rounded-[1rem] p-4 border-b">
            <form method="post" action="/dashboard/categories" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Name</label>
                        <input type="text" value="{{ old('title') }}" autofocus required name="name" id="title" class="@error('name')peer-invalid:visible border-red-700 @enderror peer bg-gray-50 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                        @error('name')
                        <p class="peer-invalid:visible text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class=" text-sm text-gray-700 block mb-1 font-medium">Slug</label>
                        <input type="text" value="{{ old('slug') }}" name="slug" id="slug" class="peer bg-gray-50 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                        @error('slug')
                        <p class="peer-invalid:visible text-red-700">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                <button type="submit" class="mt-4 py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                    Publish
                </button>
            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
    
        title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' +title.value)
            .then(response => response.json())
            .then(data=>slug.value=data.slug)
        });
    
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection