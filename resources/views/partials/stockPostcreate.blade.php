<form id="laporanForm" method="post" action="/dashboard/posts" enctype="multipart/form-data" class="container">
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
            <label for="title" class="block mb-2"><h2 class="text-primary dark:text-primary">Judul Aduan</h2></label>
            <input type="text" value="{{ old('title') }}" autofocus required name="title" id="title" class="form @error('title') peer-invalid:visible border-red-700 @enderror peer bg-gray-50 border border-gray-200 rounded-lg  py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
            @error('title')
            <p class="peer-invalid:visible text-red-700">
                {{ $message }}
            </p>
            @enderror
        </div>
        {{-- <div>
            <label for="slug" class=" block mb-2">Slug</label>
            <input type="text" value="{{ old('slug') }}" name="slug" id="slug" class="peer bg-gray-50 border border-gray-200 rounded-lg  py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
            @error('slug')
            <p class="peer-invalid:visible text-red-700">
                {{ $message }}
            </p>
            @enderror
        </div> --}}
        <div>
            <label for="category"  class="block mb-2"><h2 class="text-primary dark:text-primary">Jenis Aduan</h2></label>
            <select id="category" name= "category_id" class="form peer bg-gray-50 border border-gray-200 rounded-lg  py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full text-center">
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
            <label for="images" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
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
            <input id="body" type="hidden" name="body" value="{{ old('body') }}" class="form ">
            <trix-editor input="body" class="@error('body') peer-invalid:visible border-red-700 @enderror peer bg-gray-50 border border-gray-200 rounded-lg  py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full text-justify"></trix-editor>
            @error('body')<p class="peer-invalid:visible text-red-700">{{ $message }}</p>@enderror
        </div>
      </div>
    </div>

    <!-- step two -->
    <div class="step">
        <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your presence on the social network</p>
        <div class="mb-6">
            <input type="text" placeholder="Linked In" name="linkedin"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
        </div>
        <div class="mb-6">
            <input type="text" placeholder="Twitter" name="twitter"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
        </div>
        <div class="mb-6">
            <input type="text" placeholder="Facebook" name="facebook"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
        </div>
    </div>

    <!-- step three -->
    <div class="step">
        <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">We will never sell it</p>
        <div class="mb-6">
            <input type="text" placeholder="Full name" name="fullname"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
        </div>
        <div class="mb-6">
            <input type="text" placeholder="Mobile" name="mobile"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
        </div>
        <div class="mb-6">
            <input type="text" placeholder="Address" name="address"
                   class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
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
        <x-primary-button type="button" id="nextBtn" class="" onclick="nextPrev(1)">Lanjut</x-primary-button>
        @endauth
    </div>
    <!-- end previous / next buttons -->
</form>
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
      document.getElementById("nextBtn").innerHTML = "Lanjut";
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
                image.classList.add('w-32', 'h-32', 'object-cover', 'rounded');
                previewContainer.appendChild(image); // Tampilkan pratinjau gambar di dalam div
            }
            
            reader.readAsDataURL(file);
        }
    });
</script>
