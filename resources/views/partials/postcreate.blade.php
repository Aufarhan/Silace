<form id="laporanForm" method="post" action="/dashboard/posts" enctype="multipart/form-data" class="container">
  <script type="text/javascript" src="/js/trix.js"></script>
  @csrf
    <!-- start step indicators -->
    <div class="form-header flex gap-3 text-center gapy">
        <p class="stepIndicator flex-1 pb-8 relative">Isi</p>
        <p class="stepIndicator flex-1 pb-8 relative">Lokasi</p>
        <p class="stepIndicator flex-1 pb-8 relative">Konfirmasi</p>
    </div>
    <x-stars></x-stars>
    <!-- end step indicators -->

    <!-- step one -->
    <div class="step gapy">
      <div class="flex flex-col gap-y-[20px]">
        <div>
            <label for="title" class="block mb-2"><h2 class="text-primary dark:text-primary">Judul Laporan</h2></label>
            <input type="text" onkeyup="showText()" placeholder="Judul Laporan Kamu" value="{{ old('title') }}" autofocus required name="title" id="title" class="form @error('title') peer-invalid:visible border-red-700 @enderror peer  w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600"/>
            @error('title')
            <p class="peer-invalid:visible text-red-700">
                {{ $message }}
            </p>
            @enderror
        </div>
        {{-- <div>
            <label for="slug" class=" block mb-2">Slug</label>
            <input type="text" value="{{ old('slug') }}" name="slug" id="slug" class="peer  w-full h-64 border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600"/>
            @error('slug')
            <p class="peer-invalid:visible text-red-700">
                {{ $message }}
            </p>
            @enderror
        </div> --}}
        <div>
            <label for="category"  class="block mb-2"><h2 class="text-primary dark:text-primary">Jenis Aduan</h2></label>
            <select id="category" onchange="showText()" name="category_id" class="form peer  w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                @foreach ($categories as $category)
                @if(old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        
        <div class="">
          <h2 class="text-center text-primary dark:text-primary mb-2 block">Lampiran Aduan</h2>
          <div class="flex items-center justify-center w-full">
            <label for="images" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Tekan disini untuk mengunggah lampiran</span> atau drag dan drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG</p>
                </div>
            </label>
          </div> 

            <div class="flex flex-row pt-[20px]">
              <div id="image-preview" class="grid grid-cols-3 gap-3"></div>
            </div>
            <input type="file" id="images" name="images[]" multiple class="hidden">
        </div>
        <div>
            <label for="body"  class="block mb-2"><h2 class="text-primary dark:text-primary">Isi Aduan</h2></label>
            <input id="body" onkeyup="showText()" type="hidden" name="body" value="{{ old('body') }}" class="form ">
            <trix-editor input="body" class="@error('body') peer-invalid:visible border-red-700 @enderror peer text-backgroundDark dark:text-backgroundLight  w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 text-justify"></trix-editor>
            @error('body')<p class="peer-invalid:visible text-red-700">{{ $message }}</p>@enderror
        </div>
      </div>
    </div>
    

    <!-- step two -->
    <div class="step gapy">
      <div class="flex flex-col gap-y-[20px]">
          <div>
              <label for="category"  class="block mb-2">
                <h2 class="text-primary dark:text-primary">Kecamatan & Wilayah</h2>
              </label>
              <select id="region" onchange="showText()" name="region_id" class="form peer  w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600">
                  @php
                    // Mengurutkan $regions berdasarkan properti 'kecamatan' atau 'wilayah'
                    $sortedRegions = $regions->sortBy('kecamatan');
                  @endphp
                  @foreach ($sortedRegions as $region)
                  @if(old('region_id') == $region->id)
                  <option value="{{ $region->id }}" selected>{{ $region->wilayah }}, {{ $region->kecamatan }}</option>
                  @else
                  <option value="{{ $region->id }}">{{ $region->kecamatan }}, {{ $region->wilayah }}</option>
                  @endif
                  @endforeach
              </select>
          </div>
          <div>
              <label for="lokasi" class="block mb-2">
                <h2 class="text-primary dark:text-primary mb-2">Lokasi</h2>
                <p class="text-secondary">Semakin lengkap semakin sigap!</p>
              </label>
              <input type="text" onkeyup="showText()" placeholder="Isi Lokasi Kejadian" value="{{ old('lokasi') }}" autofocus required name="lokasi" id="lokasi" class="form @error('lokasi') peer-invalid:visible border-red-700 @enderror peer text-backgroundDark dark:text-backgroundLight  w-full h-auto border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 text-justify"/>
              @error('lokasi')
              <p class="peer-invalid:visible text-red-700">
                  {{ $message }}
              </p>
              @enderror
          </div>
      </div>
    </div>

    <!-- step three -->
    <div class="step gapy">
      <div>
        <div class="p-2">
          <h2 class="text-primary dark:text-primary mb-2">Konfirmasi</h2>
          <p class="text-secondary">Cek kembali laporanmu sebelum mengirim laporan</p>
        </div>
        <div class="border-b-2 border-t-2 border-dashed border-primary p-2">
          <div class="flex flex-col rounded-[20px] overflow-hidden gapy ">
            <div class="flex flex-col justify-center items-center gap-2 odd:bg-backgroundLight dark:odd:bg-backgroundDark/50 even:bg-backgroundLight/50 dark:even:bg-backgroundDark py-4  shadow-md h-auto">
              <h2 class="text-primary dark:text-primary">Judul Aduan</h2>
              <p  id="displayTitle"></p>
            </div>
            <div class="flex flex-col justify-center items-center gap-2 odd:bg-backgroundLight dark:odd:bg-backgroundDark/50 even:bg-backgroundLight/50 dark:even:bg-backgroundDark py-4  shadow-md h-auto">
              <h2 class="text-primary dark:text-primary">Isi Aduan</h2>
              <x-secondary-button type="button" id="prevBtn" class="" onclick="nextPrev(-2)">Cek Kembali</x-secondary-button>
            </div>
            <div class="flex flex-col justify-center items-center gap-2 odd:bg-backgroundLight dark:odd:bg-backgroundDark/50 even:bg-backgroundLight/50 dark:even:bg-backgroundDark py-4  shadow-md h-auto">
              <h2 class="text-primary dark:text-primary">Jenis Aduan</h2>
              <p  id="displayCategory"></p>
            </div>
            <div class="flex flex-col justify-center items-center gap-2 odd:bg-backgroundLight dark:odd:bg-backgroundDark/50 even:bg-backgroundLight/50 dark:even:bg-backgroundDark py-4  shadow-md h-auto">
              <h2 class="text-primary dark:text-primary">Lokasi Aduan</h2>
              <p  id="displayRegion"></p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="gapy">
          <label for="status_id"  class="block mb-4">
            <h2 class="text-primary dark:text-primary mb-2">Sifat Laporan</h2>
            <p class="text-secondary">Bagaimana laporanmu ingin dilihat?</p>
          </label>
          <ul class="flex flex-col gap-[20px] form">
              <li>
                  <input type="radio" id="status_idNo" name="status_id" value="5" class="hidden peer/no" required />
                  <label for="status_idNo" class="p-4 inline-flex items-center justify-center peer/no  w-full h-[15dvh] border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 peer-checked/no:border-white peer-checked/no:bg-primary">                           
                      <div class="block">
                        <h2 class="">Pribadi</h2>
                        <p class="pt-2">Laporanmu hanya dapat dilihat oleh kamu dan Admin untuk diproses.</p>
                      </div>
                  </label>
              </li>
              <li>
                  <input type="radio" id="status_idYes" name="status_id" value="2" class="hidden peer/yes" required checked>
                  <label for="status_idYes" class="p-4 inline-flex items-center justify-center peer/no  w-full h-[15dvh] border-2 border-gray-300 hover:border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-primary dark:hover:bg-gray-600 peer-checked/yes:border-white peer-checked/yes:bg-primary ">
                      <div class="block ">
                          <h2 class="">Publik</h2>
                          <p class="pt-2">Laporanmu dapat dilihat oleh orang lain dan dapat disebarluaskan.</p>
                      </div>
                  </label>
              </li>
          </ul>
  
        </div>
      </div>
    </div>


    <!-- start previous / next buttons -->
    <div class="form-footer gapy flex items-center justify-center gap-3">
        <x-secondary-button type="button" id="prevBtn" class="" onclick="nextPrev(-1)">Cek Kembali</x-secondary-button>
        @guest
        <x-primary-button>
          <a href="/dashboard" id="nextBtn" class="" onclick="nextPrev(1)">Login</a>
        </x-primary-button>
        @endguest
        @auth
        <x-primary-button type="button" id="nextBtn" class="" onclick="nextPrev(1)">Selanjutnya</x-primary-button>
        @endauth
    </div>
    <!-- end previous / next buttons -->
</form>
<script>
  function showText() {
    // Mengambil nilai dari input
    var title = document.getElementById("title").value;
    var category = document.getElementById("category").options[document.getElementById("category").selectedIndex].text;
    var region = document.getElementById("region").options[document.getElementById("region").selectedIndex].text;
    
    // Menampilkan nilai di elemen lain
    document.getElementById("displayTitle").innerText = title;
    document.getElementById("displayCategory").innerText = category;
    document.getElementById("displayRegion").innerText = region;
  }
</script>

<script>var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("step");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Selanjutnya";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("step");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("laporanForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("step");
    y = x[currentTab].getElementsByClassName("form");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("stepIndicator");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>
