// Fungsi untuk menampilkan atau menyembunyikan daftar wilayah
function searchFunction() {
    document.getElementById("regionList").classList.toggle("show");
}

// Fungsi untuk menyaring daftar wilayah berdasarkan input pengguna
function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("regionInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("regionList");
    a = div.getElementsByTagName("label");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

// Event listener untuk menyembunyikan daftar wilayah ketika pengguna menyentuh bagian lain dari halaman
document.addEventListener("click", function(event) {
    var regionList = document.getElementById("regionList");
    var regionInput = document.getElementById("regionInput");
    // Periksa apakah target yang disentuh bukanlah bagian dari daftar wilayah atau input
    if (event.target !== regionList && event.target !== regionInput) {
        // Jika bukan, sembunyikan daftar wilayah
        regionList.classList.remove("show");
    }
});

