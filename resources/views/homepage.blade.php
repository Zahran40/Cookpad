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

<body id="cari">


    <!-- Navbar -->
   {{-- filepath: c:\laragon\www\Cookpad\resources\views\homepage.blade.php --}}
@include('Navbar.navbar')
    <!-- Sidebar -->
    @include('Navbar.sidebar')


    <!-- Search Bar -->
    <div class="container my-4">
        <div class="d-flex justify-content-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/2560px-Cookpad_logo.svg.png"
                alt="" style="width: 200px; margin-bottom: 20px;">
        </div>
    </div>
    <div class="container my-4">
        <form class="d-flex" style="margin: 0 auto;" action="{{ route('search') }}" method="GET">
    <input type="text" class="form-control me-2 mt-4" name="keyword" placeholder=" 🔍 Cari resep, bahan, pengguna"
        style="font-size: 20px; padding: 8px 12px; border: 1.5px solid #ccc; border-radius: 5px;"
        value="{{ request('keyword') }}">
    <button class="btn-oren mt-4" style="font-size: 20px;">Cari</button>
</form>
    </div>




    <!-- Banner -->
    <div class="container my-4 mt-5">
        <div class="d-flex justify-content-center">
            <img src="banner.png" alt="" style="width: 1500px; margin-top: 20px;">
        </div>
    </div>

    <!-- Populer -->
    <!-- Pencarian Populer -->
<div class="container mb-5">
    <h4 class="mb-3">Resep Terbaru</h4>
    <div id="populer-carousel" style="position: relative; min-height: 350px;">
    @php
        $chunks = $populer->chunk(8);
    @endphp
    @foreach($chunks as $i => $batch)
        <div class="populer-batch"
            style="position: absolute; top:0; left:0; width:100%; transition: opacity 1s; opacity: {{ $i === 0 ? '1' : '0' }}; z-index: {{ $i === 0 ? '2' : '1' }};">
            <div class="row">
                @foreach($batch as $resep)
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card recipe-card h-100 shadow-sm">
                            <img src="{{ $resep->gambar_resep ?? 'https://via.placeholder.com/280x96?text=No+Image' }}"
                                class="card-img-top" alt="{{ $resep->nama_resep }}">
                            <div class="card-body p-2">
                                <a href="{{ route('resep.show', ['id' => $resep->id]) }}" class="card-text" style="color: inherit; text-decoration: none;">
                                    {{ $resep->nama_resep }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
</div>

    <!-- JavaScript untuk mengubah opacity dan z-index -->


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const batches = document.querySelectorAll('.populer-batch');
    let idx = 0;
    setInterval(() => {
        if (batches.length < 2) return;
        // Fade out current batch
        batches[idx].style.opacity = 0;
        batches[idx].style.zIndex = 1;
        // Setelah animasi fade out selesai (1 detik), tampilkan batch berikutnya
        setTimeout(() => {
            batches[idx].style.display = 'none';
            idx = (idx + 1) % batches.length;
            batches[idx].style.display = 'block';
            batches[idx].style.opacity = 1;
            batches[idx].style.zIndex = 2;
        }, 1000);
    }, 5000);

    // Pastikan hanya batch pertama yang tampil di awal
    batches.forEach((batch, i) => {
        batch.style.display = (i === 0) ? 'block' : 'none';
    });
});
</script>



            


   
<!-- Resep Populer -->
<div class="container mb-5">
    <h4 class="mb-3">Rekomendasi buat kamu</h4>
    <div class="row g-3">
        @foreach($resepAcak as $resep)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card recipe-card h-100 shadow-sm" style="min-width: 180px; max-width: 260px; margin: 0 auto;">
                    <img src="{{ $resep->gambar_resep ?? 'https://via.placeholder.com/180x120?text=No+Image' }}"
                        class="card-img-top"
                        alt="{{ $resep->nama_resep }}"6
                        style="height:120px; width:100%; object-fit:cover;">
                    <div class="card-body d-flex flex-column justify-content-between p-2" style="font-size: 1rem;">
                        <a href="{{ route('resep.show', ['id' => $resep->id]) }}"
                           class="card-title mb-2"
                           style="color: #e67e22; font-weight: bold; font-size: 1.05rem; text-decoration: none;">
                            {{ $resep->nama_resep }}
                        </a>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ $resep->user && $resep->user->foto_profile ? $resep->user->foto_profile : 'https://ui-avatars.com/api/?name='.urlencode($resep->user->nama ?? 'User') }}"
                                alt="Profile"
                                width="90"
                                height="40"
                                class="me-2 rounded-circle border"
                                style="object-fit:cover; aspect-ratio:1/1;">
                            <span class="card-text mb-0" style="font-size: 1rem; color: #333;">
                                {{ $resep->user->nama ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

<!-- Lihat apa yang sedang dimasak -->
<div class="container mb-5">
    <h4 class="mb-3">Lihat apa yang sedang dimasak orang-orang!</h4>
    <h5 class="mb-3">Sate</h5>
    <div class="row g-4">
        @forelse($resepSate as $resep)
            <div class="col-12 col-sm-6 col-md-3 d-flex">
                <div class="card recipe-card shadow h-100 w-100" style="min-width: 200px; max-width: 260px; margin: 0 auto; display: flex; flex-direction: column;">
                    <img src="{{ $resep->gambar_resep ?? 'https://via.placeholder.com/260x130?text=No+Image' }}"
                        class="card-img-top"
                        alt="{{ $resep->nama_resep }}"
                        style="height:130px; width:100%; object-fit:cover;">
                    <div class="card-body p-2 d-flex flex-column justify-content-between" style="font-size: 1rem; flex:1;">
                        <a href="{{ route('resep.show', $resep->id) }}" class="card-text2 mb-2" style="color: inherit; text-decoration: none; font-weight: 600;">
                            {{ $resep->nama_resep }}
                        </a>
                        <div class="d-flex align-items-center mt-auto">
                            <img src="{{ $resep->user && $resep->user->foto_profile ? $resep->user->foto_profile : 'https://ui-avatars.com/api/?name='.urlencode($resep->user->nama ?? 'User') }}"
                                alt="Profile"
                                width="90"
                                height="38"
                                class="me-2 rounded-circle border"
                                style="object-fit:cover; aspect-ratio:1/1;">
                            <span class="card-text mb-0" style="font-size: 1rem; color: #333;">
                                {{ $resep->user->nama ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Belum ada resep sate yang dimasak.</div>
            </div>
        @endforelse
    </div>
</div>
</div>

    

    <section id="kategori">
        <div class="container mb-5" style="padding-top: 15px;">
            <h4 class="mb-3">Kategori</h4>
            <h3 class="mb-3">Masakan Rumahan Sehari-hari</h3>
            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('ayam') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">AYAM
                            <img src="https://img-global.cpcdn.com/recipes/2d73965fe4cb091b/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('cumi') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">CUMI - CUMI
                            <img src="https://img-global.cpcdn.com/recipes/cead36a0864e0cbe/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('daging') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">DAGING SAPI
                            <img src="https://img-global.cpcdn.com/recipes/27790acd724ea20f/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('kambing') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">KAMBING
                            <img src="https://img-global.cpcdn.com/recipes/00853da369753412/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('kentang') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">KENTANG
                            <img src="https://img-global.cpcdn.com/recipes/73fc6be46f5c6d6e/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('mie') }}" style="font-size: 20px; color: inherit; text-decoration: none;">MIE
                            <img src="https://img-global.cpcdn.com/recipes/1c254cd2398150ee/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 7 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('sayur') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">SAYUR
                            <img src="https://img-global.cpcdn.com/recipes/cddd659758f9c9fa/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 8 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('tahu') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">TAHU
                            <img src="https://img-global.cpcdn.com/recipes/e185f179b40974c3/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 9 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('telur') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">TELUR
                            <img src="https://img-global.cpcdn.com/recipes/50e07f23172d1540/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 10 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('tempe') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">TEMPE
                            <img src="https://img-global.cpcdn.com/recipes/e1f5995154c195a5/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
                <!-- Card 11 -->
                <div class="col-12 col-md-4">
                    <div class="card-kategori">
                        <a href="{{ route('udang') }}"
                            style="font-size: 20px; color: inherit; text-decoration: none;">UDANG
                            <img src="https://img-global.cpcdn.com/recipes/c1504195d57f1719/624x400cq70/photo.webp"
                                alt="" style="width: 100%; height: auto;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-4 mt-5">
        <div class="d-flex mt-2">
            <h5>Tentang Kami</h5>
        </div>
        <p style="font-size: 20px;">
            Cookpad adalah platform yang memungkinkan pengguna untuk berbagi dan menemukan resep masakan dari seluruh
            dunia. Dengan fokus pada komunitas, Cookpad menyediakan ruang bagi para koki rumahan untuk berinteraksi,
            berbagi pengalaman, dan menemukan inspirasi masakan baru.
            Misi kami di Cookpad adalah untuk membuat masak sehari-hari makin menyenangkan, karena kami percaya bahwa
            memasak adalah
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
            document.getElementById("mySidebar").style.left = "0"; // Tampilkan sidebar
        }
        function closeNav() {
            document.getElementById("mySidebar").style.left = "-250px"; // Sembunyikan sidebar
        }
    </script>
</body>

</html>