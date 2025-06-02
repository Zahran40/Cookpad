<nav class="navbar navbar-light bg-white border-bottom px-4 py-2">
    <button class="btn btn-outline-secondary me-3" style="font-size: 20px;"
    @if (Route::currentRouteName() == 'homepage') disabled @else onclick="window.history.back();" @endif>
    ← Kembali
</button>
    <div class="d-flex align-items-center">
        {{-- ...logo di sini jika perlu... --}}
    </div>
    <div class="d-flex align-items-center">
        {{-- Tombol Tulis selalu tampil --}}
        <a href="@auth {{ route('tulis') }} @else {{ route('showlogin') }} @endauth">
            <button class="btn-oren me-3">
                <img src="https://cdn-icons-png.flaticon.com/512/1024/1024824.png" alt=""
                    style="width: 35px; margin-right: 10px;">Tulis
            </button>
        </a>
        @guest
            <a href="{{ route('showlogin') }}">
                <button class="btn btn-outline-secondary me-3"
                    style="font-size: 25px; font-weight: 500; font-family: Montserrat;">Masuk</button>
            </a>
        @else
            {{-- Foto profile dan dropdown --}}
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->foto_profile ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->nama) }}"
                        alt="profile" width="45" height="45" class="rounded-circle me-2">
                    <span style="font-size: 18px;">{{ Auth::user()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-oren {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
        }

        .btn-oren:hover {
            background-color: #e64a19;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
    </style>