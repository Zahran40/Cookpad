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
    <nav class="navbar navbar-light bg-white border-bottom px-4 py-2">
        <div class="d-flex align-items-center">

        </div>
        <div>
            <button class="btn btn-outline-secondary me-3"
                style="font-size: 25px; font-weight: 500; font-family: Montserrat;">Masuk</button>
            <a href="{{ route('tulis') }}">
                <button class="btn-oren"><img src="https://cdn-icons-png.flaticon.com/512/1024/1024824.png" alt=""
                        style="width: 35px; margin-right: 10px;">Tulis</button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            style="font-family: Montserrat;font-size: 30px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/2560px-Cookpad_logo.svg.png"
                alt="" style="width: 140px;">
            <img src="https://static.thenounproject.com/png/943458-200.png" alt="" style="width: 35px;"
                class="hover-image">
        </a>
        <a href="{{ route('homepage') }}#cari">🔎 Cari</a>
        <a href="{{ route('homepage') }}#kategori">Kategori</a>
        <a href="{{ route('myresep') }}">Resepmu</a>
        <a href="{{ route('koleksi') }}">Koleksi</a>
    </div>
    <!-- Tombol untuk membuka sidebar -->
    <span class="open-btn" onclick="openNav()">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/2560px-Cookpad_logo.svg.png"
            alt="" style="width: 120px;">
        <img src="https://cdn0.iconfinder.com/data/icons/large-black-icons/512/Shift_navigator_stock_up_right.png"
            style="width: 25x; margin-left: 15px;" alt="" class="hover-image">
    </span>

    <!-- Search Bar -->
    <div class="container">
        <div class="mb-4">
            <form class="d-flex" style="margin: 0 auto;">
                <input type="text" class="form-control me-2 mt-4" placeholder=" 🔍 Cari resep, bahan, pengguna"
                    style="font-size: 20px; padding: 8px 12px; border: 1.5px solid #ccc; border-radius: 5px;">

                <button class="btn-oren mt-4" style="font-size: 20px;">Cari</button>
            </form>
        </div>
        <div class="mb-4">
            <div class="d-flex justify-content-between">
                <div>
                    <button class="btn btn-link" style="color: inherit;">Terbaru</button>
                </div>
            </div>
            <div>
                <h4 class="mt-4">Resep Telur <span class="text-muted">(101)</span></h4>
            </div>
        </div>


             @foreach ($reseps as $resep)
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="d-flex" style="height: 150px;">
                    <img src="{{ $resep->gambar_resep }}"
                         class="img-fluid"
                         style="max-width: 150px; object-fit: cover;"
                         alt="{{ $resep->nama_resep }}">
                    <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                        <a href="{{ route('resep.show', $resep->id) }}" class="card-text"
                           style="color: inherit; text-decoration: none; font-weight: bold;">
                            {{ $resep->nama_resep }}
                        </a>
                        <p class="card-texts" style="flex-grow: 1; overflow: hidden; text-overflow: ellipsis;">
                            {{ $resep->bahan }}
                        </p>
                        <p class="text-muted mb-0">
                            {{ $resep->waktu_pembuatan ?? 'Tidak disebutkan' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

        <div class="container my-4 mt-5">
            <div class="d-flex mt-2">
                <h5>Tentang Kami</h5>
            </div>
            <p style="font-size: 20px;">
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

        <div class="container my-4 mt-5">
            <div class="d-flex">
                <h5>Unduh Aplikasi Kami</h5>
            </div>

            <a href="https://play.google.com/store/apps/details?hl=id&id=com.mufumbo.android.recipe.search&referrer=utm_campaign%3Dstandard%26utm_medium%3Dfooter%26utm_source%3Dcookpad-global-web"
                target="_blank">
                <img src="https://static.cookpad.com/global/assets/images/id/button_google_play_store.svg"
                    alt="Play Store" style="width: 150px; margin-left: 20px; margin-top: 15px;">
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
                document.getElementById("mySidebar").style.left = "0"; // Tampilkan sidebar
            }
            function closeNav() {
                document.getElementById("mySidebar").style.left = "-250px"; // Sembunyikan sidebar
            }
        </script>
</body>

</html>