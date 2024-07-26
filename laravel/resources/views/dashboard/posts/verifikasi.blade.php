<x-app-layout>
   <div class="background pb-[8dvh] relative">
      <div class="overflow-hidden pb-[30px]">
         <div class="pb-2 pt-[14dvh] text-center">
            <h1 class="">Verifikasi Laporan</h1>
            <p class=" pt-2">Cek apakah laporan sudah valid dengan mencentang 3 kotak validasi.</p>
         </div>
         @if($posts->count() > 0)

         <!-- Dropdown untuk memilih status laporan -->

         <!-- Daftar laporan pengguna -->
         <div class="grid grid-cols-1 container gap-6 pt-[6dvh]">
            @foreach ($posts as $post)
            <div class="relative">
                <div class="layer1 shadow-lg rounded-md truncate h-auto flex flex-col gap-2 p-3 relative">
                    <div class="flex flex-row justify-center gap-2 absolute w-full p-2 top-0 left-0
                        @if ($post->status_id == 1)
                            bg-green-600
                        @elseif ($post->status_id == 2)
                            bg-green-600 
                        @elseif ($post->status_id == 3 || $post->status_id == 6)
                            bg-blue-600 
                        @elseif ($post->status_id == 4 || $post->status_id == 7)
                            bg-violet-600 
                        @endif">
                        <p class="text-xs font-medium text-center text-white dark:text-white">{{ $loop->iteration }}</p>
                    </div>
                    <div class="pt-8 text-left">
                        <p class="text-sm pt-2">Judul Laporan</p>
                        <h3>{!! Str::limit($post->title, 35) !!}</h3>
                        <p class="text-sm pt-2">Jenis Laporan</p>
                        <h3>{{ $post->category->name }}</h3>
                        <p class="text-sm pt-2">Pelapor</p>
                        <h3>@if ($post->author){{ $post->author->email }}
                            @else
                            anonymous@gmail.com
                        @endif</h3>
                        <p class="text-sm pt-2">Lokasi Laporan</p>
                        <h3>{{ $post->lokasi }}</h3>
                        <p class="text-sm pt-2">Unggahan</p>
                        <h3>@if($post->images) {{ count($post->images) }} unggahan @else Tidak ada unggahan @endif</h3>
                    </div>
                    <div class="flex flex-col gap-1 text-sm">
                        <p class="py-2 text-sm">Check Validasi : </p>
                        <div>
                            <input type="checkbox" name="checkTitle" id="checkTitle-{{ $post->slug }}" {{ strlen($post->title) > 15 ? 'checked' : '' }} class="w-6 h-6 rounded bg-red-700 border-red-600 text-red-600 checked:text-blue-600 checked:bg-blue-700 checked:border-blue-600">
                            <span class="px-2">Judul (lebih dari 15 Karakter)</span>
                        </div>
                        <div>
                            <input type="checkbox" name="checkLaporan" id="checkLaporan-{{ $post->slug }}" {{ strlen($post->body) > 50 ? 'checked' : '' }} class="w-6 h-6 rounded bg-red-700 border-red-600 text-red-600 checked:text-blue-600 checked:bg-blue-700 checked:border-blue-600">
                            <span class="px-2">Laporan (lebih dari 50 Karakter)</span>
                        </div>
                        <div>
                            <input type="checkbox" name="checkUnggah" id="checkUnggah-{{ $post->slug }}" {{ $post->images ? 'checked' : '' }} class="w-6 h-6 rounded bg-red-700 border-red-600 text-red-600 checked:text-blue-600 checked:bg-blue-700 checked:border-blue-600">
                            <span class="px-2">Laporan memiliki unggahan</span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-1 justify-between">
                    <a href="/posts/{{ $post->slug }}/show">
                        <div class="bg-primary text-white dark:text-white dark:bg-primary w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                            <p class="text-sm">Lihat</p>
                        </div>
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit">
                        <div class="bg-primary text-white dark:text-white dark:bg-primary w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                            <p class="text-sm">Edit</p>
                        </div>
                    </a>
                    <form id="status-update-form-{{ $post->slug }}" action="{{ route('dashboard.verifikasi.updateStatus', $post->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
        
                        <button type="button" id="terima-btn-{{ $post->slug }}" class="disabled text-white w-full p-3 rounded-b-md flex flex-row items-center gap-2 justify-center" onclick="submitStatusUpdateForm('{{ $post->slug }}')" disabled>
                            Terima
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        
        <style>
            .disabled {
                background-color: #d1d5db; /* Warna abu-abu */
                cursor: not-allowed;
            }
            .enabled {
                background-color: #10b981; /* Warna hijau untuk enabled */
                cursor: pointer;
            }
        </style>
        
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($posts as $post)
            (function() {
                const terimaBtn = document.getElementById('terima-btn-{{ $post->slug }}');
                const checkboxes = [
                    document.getElementById('checkTitle-{{ $post->slug }}'),
                    document.getElementById('checkLaporan-{{ $post->slug }}'),
                    document.getElementById('checkUnggah-{{ $post->slug }}')
                ];
        
                checkboxes.forEach(checkbox => {
                    if (checkbox) {
                        checkbox.addEventListener('change', updateButtonState);
                    }
                });
        
                function updateButtonState() {
                    const allChecked = checkboxes.every(checkbox => checkbox && checkbox.checked);
                    console.log("Post Slug:", '{{ $post->slug }}', "All Checked:", allChecked); // Debugging
        
                    if (allChecked) {
                        terimaBtn.classList.remove('disabled');
                        terimaBtn.classList.add('enabled');
                        terimaBtn.disabled = false;
                    } else {
                        terimaBtn.classList.remove('enabled');
                        terimaBtn.classList.add('disabled');
                        terimaBtn.disabled = true;
                    }
                }
        
                // Inisialisasi status tombol saat halaman dimuat
                updateButtonState();
            })();
            @endforeach
        });
        
        function submitStatusUpdateForm(postslug) {
            document.getElementById('status-update-form-' + postslug).submit();
        }
        </script>
         @include('partials.pagination')

         @else
            <p class="text-center pt-[6dvh]">Tidak ada laporan yang perlu diverifikasi, <a class="text-primary dark:text-primary" href="/dashboard">Kembali ke Dashboard</a></p>
         @endif
      </div>
   </div>
</x-app-layout>
