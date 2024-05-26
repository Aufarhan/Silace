@if(session()->has('success'))
<div id="alertDiv" class="flex w-full absolute left-0 -bottom-[75px] z-[99] bg-green-400/60 rounded-b-[1rem] backdrop-blur-sm ring ring-green-300/70 p-4 shadow-md text-sm" role="alert">
  <svg class="w-5 h-5 inline mr-3 fill-layerWhite dark:fill-layerLight" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
  </svg>
  <div>
      <p class="">{{ session('success') }}</p>
  </div>
  <button id="closeAlert" class="ml-auto bg-transparent text-black-50 hover:text-black-75" aria-label="Close">
      &times;
  </button>
</div>

<script>
  document.getElementById('closeAlert').addEventListener('click', function() {
      var alertDiv = document.getElementById('alertDiv');
      if(alertDiv) {
          alertDiv.style.display = 'none';
      }
  });

  // Fungsi untuk menghilangkan elemen setelah 4 detik
  // setTimeout(function() {
  //     var alertDiv = document.getElementById('alertDiv');
  //     if(alertDiv) {
  //       alertDiv.style.display = 'none';
  //     }
  // }, 4000);
   // 4000 milliseconds = 4 detik
</script>
@endif
