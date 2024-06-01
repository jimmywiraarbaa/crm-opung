<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index_product') }}">
            Opung Waffle
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link me-3 me-sm-0 " href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            @if (Auth::user()->profile_picture)
                                <img class="rounded-circle mx-2" width="40" height="40"
                                    src="{{ asset('images/' . Auth::user()->profile_picture) }}" alt="Foto Profil">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_admin == true)
                                <a class="dropdown-item" href="{{ route('create_product') }}">
                                    Tambah Produk
                                </a>
                                <a class="dropdown-item" href="{{ route('index_order') }}">
                                    Pesanan
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('show_cart') }}">
                                    Keranjang
                                </a>
                                <a class="dropdown-item" href="{{ route('index_order') }}">
                                    Riwayat Order
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('show_profile') }}">
                                Profile
                            </a>

                            <a class="dropdown-item text-bg-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
