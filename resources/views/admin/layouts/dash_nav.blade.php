<div data-aos="fade-right" class="w-25 shadow d-flex flex-column pb-4" style="height: 100vh;">
    <div>
        <a href="{{ url('/dashboard') }}" class="d-flex justify-content-center pt-3 text-decoration-none">
            <img src="{{ asset('images/opung-profile.jpg') }}" alt="" class="w-25 rounded-circle">
        </a>
        <div class="card-body mt-5">
            <ul class="list-group text-center rounded-0 fs-5">
                <a href="{{ url('/dashboard') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('dashboard') ? 'bg-opung text-white' : 'text-opung' }} py-3">
                        Beranda
                    </li>
                </a>
                <a href="{{ url('/dashboard/order') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('dashboard/order', 'dashboard/order/*') ? 'bg-opung text-white' : 'text-opung' }} mt-2 py-3">
                        Pesanan
                    </li>
                </a>
                <a href="{{ url('/dashboard/product') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('dashboard/product', 'dashboard/product/search') ? 'bg-opung text-white' : 'text-opung' }} mt-2 py-3">
                        Tambah Produk
                    </li>
                </a>
                <a href="{{ url('/dashboard/discount') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('dashboard/discount') ? 'bg-opung text-white' : 'text-opung' }} mt-2 py-3">
                        Diskon
                    </li>
                </a>
                <a href="{{ url('/dashboard/report') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('dashboard/report') ? 'bg-opung text-white' : 'text-opung' }} mt-2 py-3">
                        Laporan
                    </li>
                </a>
                <a href="{{ url('/product') }}" class="text-decoration-none">
                    <li
                        class="list-group-item border-0 {{ request()->is('/product') ? 'bg-opung text-white' : 'text-opung' }} mt-2 py-3">
                        Menu
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <div class="mt-auto d-flex flex-column" style="padding: 0 5rem;">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="d-flex align-items-center justify-content-center py-2 rounded-pill bg-opung btn">
            <div>
                <svg width="40" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_15_49)">
                        <path
                            d="M30.72 0C40.155 0 48.891 4.185 54.684 11.232C54.849 11.4318 54.9722 11.6627 55.0462 11.911C55.1202 12.1593 55.1434 12.42 55.1146 12.6775C55.0858 12.935 55.0054 13.1841 54.8784 13.4099C54.7513 13.6357 54.5801 13.8337 54.375 13.992C53.9574 14.3193 53.4288 14.471 52.9012 14.415C52.3736 14.359 51.8886 14.0997 51.549 13.692C49.0159 10.6237 45.8333 8.15589 42.2308 6.46671C38.6283 4.77752 34.6958 3.90907 30.717 3.924C15.972 3.924 4.017 15.6 4.017 30C4.017 44.4 15.972 56.076 30.717 56.076C34.7532 56.0914 38.741 55.1979 42.3847 53.4618C46.0284 51.7256 49.2344 49.1913 51.765 46.047C52.0988 45.6351 52.5799 45.3694 53.1063 45.3061C53.6327 45.2428 54.1631 45.387 54.585 45.708C54.7919 45.8636 54.9655 46.0592 55.0953 46.2832C55.2251 46.5072 55.3086 46.755 55.3408 47.0119C55.373 47.2688 55.3532 47.5296 55.2826 47.7787C55.2121 48.0278 55.0921 48.2602 54.93 48.462C49.146 55.692 40.293 60 30.72 60C13.749 60 0 46.569 0 30C0 13.431 13.752 0 30.72 0ZM51.294 21.48L59.412 29.601C60.198 30.384 60.213 31.641 59.448 32.409L51.516 40.338C51.1396 40.7063 50.6324 40.91 50.1058 40.9044C49.5792 40.8988 49.0764 40.6843 48.708 40.308C48.521 40.1257 48.3719 39.9084 48.269 39.6684C48.1662 39.4284 48.1116 39.1704 48.1086 38.9093C48.1055 38.6483 48.154 38.3891 48.2512 38.1468C48.3483 37.9044 48.4924 37.6836 48.675 37.497L53.316 32.856H22.386C22.1252 32.8592 21.8663 32.8109 21.6241 32.714C21.382 32.6172 21.1613 32.4735 20.9746 32.2913C20.788 32.1091 20.639 31.892 20.5363 31.6522C20.4336 31.4125 20.3791 31.1548 20.376 30.894C20.376 29.808 21.276 28.929 22.386 28.929H53.193L48.519 24.255C48.1423 23.887 47.9273 23.3844 47.9211 22.8578C47.9149 22.3313 48.1181 21.8238 48.486 21.447C48.8628 21.0791 49.3703 20.8759 49.8968 20.8821C50.4234 20.8883 50.926 21.1033 51.294 21.48Z"
                            fill="#FFF9F9" />
                    </g>
                    <defs>
                        <clipPath id="clip0_15_49">
                            <rect width="60" height="60" rx="30" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="ms-3">
                <p class="text-white text-center fs-5 m-0 p-0">Logout</p>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
