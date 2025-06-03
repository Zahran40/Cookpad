<!-- filepath: c:\laragon\www\Cookpad\resources\views\resep.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cookpad Duplicate</title>
    @vite('resources/css/app.css')
    <!-- Bootstrap & font (opsional) -->
</head>

<body>
    <!-- Navbar -->
    @include('Navbar.navbar')

    <!-- Sidebar -->
    @include('Navbar.sidebar')

    <div class="container mt-5">
        <div class="row">
            <!-- Kolom kiri: Gambar -->
            <div class="col-md-4 d-flex align-items-start justify-content-center">
                <img src="{{ asset($resep->gambar_resep) }}"
                    alt="{{ $resep->nama_resep }}" class="recipe-image"
                    style="width: 320px; max-width:100%; border-radius:10px;">
            </div>
            <!-- Kolom kanan: Info resep -->
            <div class="col-md-8">
                <div class="d-flex align-items-center mb-2">
                    <h2 class="mb-0">{{ $resep->nama_resep }}</h2>
                    @if(Auth::check())
                        @if($sudahDisimpan)
                            <button class="btn btn-success ms-3" disabled>
                                <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="" style="width: 20px; margin-right: 5px;">
                                Sudah di Simpan
                            </button>
                        @else
                            <form action="{{ route('simpan-koleksi', $resep->id) }}" method="POST" style="display:inline;" class="ms-3">
                                @csrf
                                <button class="btn btn-outline-warning">
                                    <img src="https://cdn-icons-png.flaticon.com/512/6365/6365625.png" alt="" style="width: 20px; margin-right: 5px;">
                                    Simpan ke Koleksi Saya
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
                <p class="mb-3" style="font-size:1.1rem; color:#555;">
                    {{ $resep->deskripsi ?? '-' }}
                </p>
            </div>
        </div>
        
        <div class="row mt-4" style="margin-left: 25px;">
            <!-- Kolom kiri: Bahan-bahan -->
            <div class="col-md-6">
                <h3 class="mb-3">Bahan-bahan</h3>
                <ul>
                    @foreach (explode("\n", $resep->bahan) as $bahan )
                        <li>{{ $bahan }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- Kolom kanan: Cara Membuat -->
            <div class="col-md-6">
                <h3 class="mb-4">Cara Membuat</h3>
                <ul>
                    @foreach (explode("\n", $resep->langkah) as $langkah )  
                        <li>{{ $langkah }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="container comment-box">
        <h2 class="mt-5">Ditulis Oleh</h2>
        <div class="d-flex align-items-center mt-4">
            <img src="{{ $pembuat->foto_profile ?? 'https://ui-avatars.com/api/?name='.urlencode($pembuat->nama) }}"
                alt="Avatar"
                class="rounded-circle mb-4"
                style="width: 120px; height: auto; margin-right: 15px;">
            <div class="ml-3">
                <!-- filepath: c:\laragon\www\Cookpad\resources\views\resep.blade.php -->
                <!-- filepath: c:\laragon\www\Cookpad\resources\views\resep.blade.php -->
<a href="{{ route('userprofile', $pembuat->id_pembuat) }}"
   style="color: #ffc107; font-size: 1.25rem; font-weight: 600; text-decoration: none;">
    {{ $pembuat->nama }}
</a>
                <p class="mb-0">{{ $pembuat->email }}</p>
            </div>
        </div>
    </div>

    <div class="container my-4 mt-5">
        <div class="d-flex mt-2">
            <h5>Tentang Kami</h5>
        </div>
        <p style="font-size: 20px;">
            Cookpad adalah platform yang memungkinkan pengguna untuk berbagi dan menemukan resep masakan dari seluruh
            dunia. Dengan fokus pada komunitas, Cookpad menyediakan ruang bagi para koki rumahan untuk berinteraksi,
            berbagi pengalaman, dan menemukan inspirasi masakan baru.
            Misi kami di Cookpad adalah untuk membuat masak sehari-hari makin menyenangkan, karena kami percaya bahwa
            memasak adalah kunci menuju kehidupan yang lebih bahagia dan lebih sehat bagi manusia, komunitas, dan bumi.
            Kami mendukung koki rumahan di seluruh dunia untuk membantu satu sama lain dengan
            berbagi resep dan pengalaman memasak.
        </p>
    </div>

    <div class="container my-4 mt-5">
        <div class="d-flex">
            <h5>Unduh Aplikasi Kami</h5>
        </div>
        <a href="https://play.google.com/store/apps/details?hl=id&id=com.mufumbo.android.recipe.search&referrer=utm_campaign%3Dstandard%26utm_medium%3Dfooter%26utm_source%3Dcookpad-global-web"
            target="_blank">
            <img src="https://static.cookpad.com/global/assets/images/id/button_google_play_store.svg" alt="Play Store"
                style="width: 150px; margin-left: 20px; margin-top: 15px;">
        </a>
        <a href="https://apps.apple.com/id/app/id585332633?l=id" target="_blank">
            <img src="https://static.cookpad.com/global/assets/images/id/button_apple_app_store.svg" alt="App Store"
                style="width: 150px; margin-left: 20px; margin-top: 15px;">
        </a>
    </div>

    <footer>
        <p style="text-align: center; margin-top: 200px;">Copyright © Cookpad Inc.</p>
        <img src="https://global-web-assets.cpcdn.com/assets/footer/footer-210d183ce6443eb41fa78f10b270fb773bab56416e2680a35328f51e8ddf85d0.png"
            alt="" style="width: 100%;">
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.left = "0";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.left = "-250px";
        }
    </script>
</body>
</html>