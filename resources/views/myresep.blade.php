<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cookpad Duplicate</title>
    @vite('resources/css/app.css')
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css"> -->
</head>

<body>

    <!-- Navbar -->
    @include('Navbar.navbar')

    <!-- Sidebar -->
   @include('Navbar.sidebar')

      <!-- filepath: c:\laragon\www\Cookpad\resources\views\myresep.blade.php -->
<div class="container mt-5">
    <h2>Resepmu ({{ $reseps->count() }})</h2>
    <div class="input-group mb-3">
        
    </div>

    <div class="row g-1">
    <!-- filepath: c:\laragon\www\Cookpad\resources\views\myresep.blade.php -->
<div class="row g-1">
    @forelse($reseps as $resep)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2 d-flex">
            <div class="card mx-0" style="width: 100%; max-width: 210px;">
                <a href="{{ route('resep.show', ['id' => $resep->id]) }}">
                    <img src="{{ $resep->gambar_resep ?? 'https://via.placeholder.com/130x160?text=No+Image' }}"
                        class="card-img-top" alt="{{ $resep->nama_resep }}">
                </a>
                <div class="card-body">
                    <a href="{{ route('resep.show', ['id' => $resep->id]) }}" style="text-decoration:none;color:inherit;">
                        <h5 class="card-title">{{ $resep->nama_resep }}</h5>
                    </a>
                    @if($resep->status === 'approved')
                        <span class="badge bg-success" style="font-size:0.9em;">Approved</span>
                    @elseif($resep->status === 'pending')
                        <span class="badge bg-warning text-dark" style="font-size:0.9em;">Pending</span>
                    @else
                        <span class="badge bg-secondary" style="font-size:0.9em;">{{ ucfirst($resep->status) }}</span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada resep.</p>
    @endforelse
</div>


        <!-- filepath: c:\laragon\www\Cookpad\resources\views\myresep.blade.php -->
<div class="container my-4 mt-5" style="max-width: 900px;">
    <div class="mt-2">
        <h5 class="text-start">Tentang Kami</h5>
    </div>
    <p style="font-size: 20px; text-align: left;">
        Cookpad adalah platform yang memungkinkan pengguna untuk berbagi dan menemukan resep masakan dari
        seluruh dunia. Dengan fokus pada komunitas, Cookpad menyediakan ruang bagi para koki rumahan untuk
        berinteraksi, berbagi pengalaman, dan menemukan inspirasi masakan baru.
        Misi kami di Cookpad adalah untuk membuat masak sehari-hari makin menyenangkan, karena kami percaya
        bahwa memasak adalah
        kunci menuju kehidupan yang lebih bahagia dan lebih sehat bagi manusia, komunitas, dan bumi.
        Kami mendukung koki rumahan di seluruh dunia untuk membantu satu sama lain dengan
        berbagi resep dan pengalaman memasak.
    </p>
</div>

<div class="container my-4 mt-5" style="max-width: 900px;">
    <div class="mt-2">
        <h5 class="text-start">Unduh Aplikasi Kami</h5>
    </div>
    <a href="https://play.google.com/store/apps/details?hl=id&id=com.mufumbo.android.recipe.search&referrer=utm_campaign%3Dstandard%26utm_medium%3Dfooter%26utm_source%3Dcookpad-global-web"
        target="_blank">
        <img src="https://static.cookpad.com/global/assets/images/id/button_google_play_store.svg"
            alt="Play Store" style="width: 150px; margin-top: 15px;">
    </a>
    <a href="https://apps.apple.com/id/app/id585332633?l=id" target="_blank">
        <img src="https://static.cookpad.com/global/assets/images/id/button_apple_app_store.svg" alt="App Store"
            style="width: 150px; margin-top: 15px;">
    </a>
</div>

<footer style="max-width: 900px; margin: 40px auto 0 auto;">
    <p style="text-align: left; margin-bottom: 0;">Copyright © Cookpad Inc.</p>
    <img src="https://global-web-assets.cpcdn.com/assets/footer/footer-210d183ce6443eb41fa78f10b270fb773bab56416e2680a35328f51e8ddf85d0.png"
        alt="" class="w-100">
</footer>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function openNav() {
                document.getElementById("mySidebar").style.left = "0"; // Tampilkan sidebar
            }
            function closeNav() {
                document.getElementById("mySidebar").style.left = "-250px"; // Sembunyikan sidebar
            }
        </script>
</body>

</html>