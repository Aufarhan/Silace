<x-app-layout>
    <div class="background pb-[8dvh] relative">
        <div class="overflow-hidden pb-[30px]">
            <div class="pb-2 pt-[14dvh] text-center">
                <h1 class="">Proses Laporan</h1>
                <p class="pt-2">Cek apakah laporan sudah valid dengan mencentang 3 kotak validasi.</p>
            </div>
            @if($posts->count() > 0)
            <div class="grid grid-cols-1 container gap-6 pt-[6dvh]">
                @foreach ($posts as $post)
                <form id="proses-update-form-{{ $post->slug }}" action="{{ route('dashboard.proses.updateProses', $post->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                                <p class="text-xs font-medium text-center text-white dark:text-white">{{ $post->status->name }}</p>
                            </div>
                            <div class="pt-8 text-left">
                                <p class="text-sm pt-2">Judul Laporan</p>
                                <h3>{!! Str::limit($post->title, 35) !!}</h3>
                                <p class="text-sm pt-2">Pelapor</p>
                                <h3>@if ($post->author){{ $post->author->email }}
                                    @else
                                    anonymous@gmail.com
                                @endif</h3>
                                <p class="text-sm py-2">Komentar status saat ini</p>
                                <!-- Textarea for Komentar -->
                                <textarea name="komentar" id="komentar-{{ $post->slug }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi status laporan saat ini...">{{ $post->komentar }}</textarea>
                            </div>
                            <div class="flex flex-col gap-1 text-sm">
                                <!-- Konten lainnya -->
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-1 justify-between">
                            <!-- Tombol "Proses" -->
                            <button type="button" id="proses-btn-{{ $post->slug }}" class="bg-primary text-white dark:text-white dark:bg-primary w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center" onclick="updatePostStatus('{{ $post->slug }}', 3)">
                                Proses
                            </button>
                            <!-- Tombol "Laporan Selesai" -->
                            <button type="button" id="selesai-btn-{{ $post->slug }}" class="bg-primary text-white dark:text-white dark:bg-primary w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center" onclick="updatePostStatus('{{ $post->slug }}', 4)">
                                Laporan Selesai
                            </button>
                            <!-- Tombol "Terima" -->
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="bg-primary text-white dark:text-white dark:bg-primary w-full p-2 rounded-b-md flex flex-row items-center gap-2 justify-center">
                            Edit
                        </a>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
            <script>
            function updatePostStatus(postslug, statusId) {
                // Dapatkan form dan buat input hidden untuk status_id
                var form = document.getElementById('proses-update-form-' + postslug);
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'status_id';
                input.value = statusId;

                // Masukkan input ke dalam form
                form.appendChild(input);

                // Submit form
                form.submit();
            }
            </script>
            @include('partials.pagination')
            @else
            <p class="text-center pt-[6dvh]">Tidak ada laporan yang perlu diverifikasi, <a class="text-primary dark:text-primary" href="/dashboard">Kembali ke Dashboard</a></p>
            @endif
        </div>
    </div>
</x-app-layout>
