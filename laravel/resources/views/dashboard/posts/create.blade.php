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
            <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="title" class="text-sm text-gray-700 block mb-1 font-medium">Title</label>
                        <input type="text" value="{{ old('title') }}" autofocus required name="title" id="title" class="@error('title')peer-invalid:visible border-red-700 @enderror peer bg-gray-50 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                        @error('title')
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
                    <div>
                        <label for="category" class="text-sm text-gray-700 block mb-1 font-medium">Category</label>
                        <select id="category" name= "category_id" class="bg-gray-50 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                            @foreach ($categories as $category)
                            @if(old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 rounded place-items-center block text-gray-700 w-full pb-3 pl-3">
                        <div>
                            <label class="block" for="images">
                                <div class="images-preview-div w-1/3 grid grid-cols-5 gap-2"> </div>

                                <input multiple type="file" id="image" name="images[]" onchange="previewImages()" class="@error('images')peer-invalid:visible file:text-red-700 file:bg-red-50 file:border-red-700 @enderror peer block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-[1rem] file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-500 file:text-white
                                    hover:file:bg-blue-600
                                "/>
                                @error('images')
                                <p class="peer-invalid:visible text-red-700">
                                    {{ $message }}
                                </p>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="body" class=" text-sm text-gray-700 block mb-1 font-medium">Body</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body" class=" bg-gray-50 peer"></trix-editor>
                        @error('body')<p class="peer-invalid:visible text-red-700">{{ $message }}</p>@enderror
                    </div>
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
<script >
$(function() {
// Multiple images preview with JavaScript
var previewImages = function(input, imgPreviewPlaceholder) {
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
};
$('#image').on('change', function() {

    previewImages(this, 'div.images-preview-div');
});
});
</script>
@endsection