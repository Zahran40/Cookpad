 <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            style="font-family: Montserrat;font-size: 30px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/2560px-Cookpad_logo.svg.png"
                alt="" style="width: 140px;">
            <img src="https://static.thenounproject.com/png/943458-200.png" alt="" style="width: 35px;"
                class="hover-image">
        </a>
        <a href="{{ route('homepage') }}">Beranda</a>
        <a href="{{ route('search') }}">🔎 Cari</a>
        <a href="#kategori">Kategori</a>
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

    <style>
        .container {
    margin-left: 250px; /* jika sidebar lebarnya 250px */
}
    </style>