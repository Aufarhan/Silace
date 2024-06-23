@if (request()->is('dashboard/*') || request()->is('*/show'))
<a href="/dashboard" id="infoDiv" class="flex w-full absolute items-center left-0 h-[40px] top-[60px] z-[99] bg-primary dar:bg-primary  px-2 shadow-md text-sm rounded-b-[20px]">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
    </svg>
    <span class="text-sm px-2">
      <p>Kembali ke Dashboard</p></span>
</a>
@endif
@if(session()->has('success'))
<div id="successDiv" class="flex w-full absolute items-center left-0 h-[60px] top-[100px] z-[99] bg-green-400 rounded-b-[20px]  p-4 shadow-md text-sm" role="alert">
  <svg class="w-5 h-5 inline mr-3 fill-layerWhite dark:fill-layerLight" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
  </svg>
  <div>
      <p class="text-sm">{{ session('success') }}</p>
  </div>
  <button id="closeAlert" class="ml-auto bg-transparent text-black-50 hover:text-black-75" aria-label="Close">
      &times;
  </button>
</div>
@endif
@if(session()->has('error'))
<div id="alertDiv" class="flex w-full absolute left-0 h-[60px] top-[100px] z-[99] bg-red-400 rounded-b-[1rem]   p-4 shadow-md text-sm" role="alert">
  <svg class="w-5 h-5 inline mr-3 fill-layerWhite dark:fill-layerLight" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
  </svg>
  <div>
      <p class="text-sm">{{ session('error') }}</p>
  </div>
  <button id="closeAlert" class="ml-auto bg-transparent text-black-50 hover:text-black-75" aria-label="Close">
      &times;
  </button>
</div>
@endif

<script>
  // Function to close alert
  function closeAlert() {
      var alertDiv = document.getElementById('alertDiv');
      if (alertDiv) {
          alertDiv.style.opacity = '0';
          setTimeout(function() {
              alertDiv.style.display = 'none';
          }, 500); // Match the transition duration
      }
  }

  // Function to close success
  function closeSuccess() {
      var successDiv = document.getElementById('successDiv');
      if (successDiv) {
          successDiv.style.opacity = '0';
          setTimeout(function() {
              successDiv.style.display = 'none';
          }, 500); // Match the transition duration
      }
  }

  // Close the alert after 3 seconds
  setTimeout(closeAlert, 2000);

  // Close the success after 3 seconds
  setTimeout(closeSuccess, 3000);

  // Close the alert when the close button is clicked
  document.getElementById('closeAlert').addEventListener('click', closeAlert);

  // Close the success when the close button is clicked
  document.getElementById('closeSuccess').addEventListener('click', closeSuccess);
</script>

<style>
  #alertDiv, #successDiv {
      transition: opacity 0.5s ease-out;
  }
</style>
