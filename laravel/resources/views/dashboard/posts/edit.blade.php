<x-app-layout>
    <script type="text/javascript" src="/js/trix.js"></script>
    <div class="container pb-[8dvh] pt-[4dvh]">
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <!-- step one -->
    <div class="step gapy">
        <div class="flex flex-col gap-y-[20px]">
            @if (Auth::user()->is_admin)
            <div>
                <label for="status_id" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Status Laporan</h2>
                </label>
                <select id="status" name="status_id" class="form peer w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('status_id', $post->status_id) == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="komentar" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Komentar Status Saat Ini</h2>
                </label>
                <input type="text" placeholder="Isi Lokasi Kejadian" value="{{ old('komentar', $post->komentar) }}" required name="komentar" id="komentar" class="form @error('komentar') border-red-700 @enderror peer text-backgroundDark dark:text-backgroundLight w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 text-justify"/>
                @error('komentar')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </div>
            @endif
            <div>
                <label for="title" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Judul Laporan</h2>
                </label>
                <input type="text" placeholder="Judul Laporan Kamu" value="{{ old('title', $post->title) }}" autofocus required name="title" id="title" class="form @error('title') border-red-700 @enderror peer w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600"/>
                @error('title')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Jenis Aduan</h2>
                </label>
                <select id="category" name="category_id" class="form peer w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h2 class="text-center text-primary dark:text-primary mb-2 block">Lampiran Aduan</h2>
                <div class="flex items-center justify-center w-full">
                    <label for="images" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center"><span class="font-semibold text-center">Tekan disini untuk mengunggah lampiran</span> atau drag dan drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG</p>
                        </div>
                    </label>
                </div>
                <input type="file" id="images" name="images[]" multiple class="hidden">

                <!-- Tambahkan ini untuk pratinjau gambar -->
                <div id="image-preview" class="flex gap-2 mt-4 flex-wrap">
                    @if ($post->images)
                        @foreach ($post->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" class="w-32 h-32 object-cover rounded-[20px]" />
                                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 text-xs" onclick="removeImage(this, '{{ $image }}')">X</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <input type="hidden" name="remove_images" id="remove-images">
            </div>
            <div>
                <label for="body" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Isi Aduan</h2>
                </label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" class="form">
                <trix-editor input="body" class="@error('body') border-red-700 @enderror peer text-backgroundDark dark:text-backgroundLight w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 text-justify p-2"></trix-editor>
                @error('body')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- step two -->
    <div class="step gapy">
        <div class="flex flex-col gap-y-[20px]">
            <div>
                <label for="region" class="block mb-2">
                    <h2 class="text-primary dark:text-primary">Kecamatan & Wilayah</h2>
                </label>
                <select id="region" name="region_id" class="form peer w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                    @foreach ($regions->sortBy('kecamatan') as $region)
                    <option value="{{ $region->id }}" {{ old('region_id', $post->region_id) == $region->id ? 'selected' : '' }}>{{ $region->wilayah }}, {{ $region->kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="lokasi" class="block mb-2">
                    <h2 class="text-primary dark:text-primary mb-2">Lokasi</h2>
                    <p>Semakin lengkap semakin sigap!</p>
                </label>
                <input type="text" placeholder="Isi Lokasi Kejadian" value="{{ old('lokasi', $post->lokasi) }}" required name="lokasi" id="lokasi" class="form @error('lokasi') border-red-700 @enderror peer text-backgroundDark dark:text-backgroundLight w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 text-justify"/>
                @error('lokasi')
                <p class="text-red-700">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Tombol Submit -->
    <!-- Tombol pertama: Update -->
    <div class="flex justify-center">
        <div id="submit-btn" class="bg-primary hover:bg-secondary text-backgroundLight font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Update</div>
    </div>

    <!-- Pesan konfirmasi dan tombol kedua: Tetap update -->
    <div class="flex flex-col items-center hidden mt-4" id="confirm-message">
        <p class="text-center text-red-500 mb-4">Jika anda melakukan update laporan, maka laporan harus diverifikasi kembali oleh admin, lanjutkan?</p>
        <button type="submit" id="confirm-btn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Tetap update</button>
    </div>
</form>
        
    </div>
    <script>
            document.addEventListener('DOMContentLoaded', function () {
            const submitBtn = document.getElementById('submit-btn');
            const confirmMessage = document.getElementById('confirm-message');
            const confirmBtn = document.getElementById('confirm-btn');
            const form = document.getElementById('update-form');

            submitBtn.addEventListener('click', function () {
                submitBtn.classList.add('hidden');
                confirmMessage.classList.remove('hidden');
            });

            confirmBtn.addEventListener('click', function () {
                form.submit();
            });
        });

        document.getElementById('images').addEventListener('change', function(event) {
            var previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = ''; // Kosongkan pratinjau sebelum menampilkan gambar yang baru dipilih
            
            var files = event.target.files;
            for(var i=0; i<files.length; i++) {
                var file = files[i];
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    var image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('w-32', 'h-32', 'object-cover', 'rounded-[20px]');
                    previewContainer.appendChild(image); // Tampilkan pratinjau gambar di dalam div
                }
                
                reader.readAsDataURL(file);
            }
        });
    
        function removeImage(button, imagePath) {
        // Hapus elemen gambar dari pratinjau
        button.closest('div').remove();
        // Update input hidden dengan path gambar yang dihapus
        var input = document.getElementById('remove-images');
        var currentVal = input.value ? input.value.split(',') : [];
        currentVal.push(imagePath);
        input.value = currentVal.join(',');
    }
    </script>
</x-app-layout>