<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail - {{ $product->name }}</title>
    </head>

    <body>
        @extends('layouts.app')
        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- Bagian Produk --}}
                        <div class="card">
                            <div class="card-header">{{ __('Produk Detail') }}</div>

                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-around flex-lg-row">

                                    <div class="d-flex flex-column mb-3 me-lg-4 ">
                                        <a class="text-decoration-none" href="{{ route('index_product') }}">&lt;
                                            Kembali</a><br>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ url('storage/' . $product->image) }}" alt="" width="200px"
                                                class="rounded ">
                                        </div>
                                    </div>

                                    <div>
                                        <h1>{{ $product->name }}</h1>
                                        <h6>{{ $product->description }}</h6>
                                        <h3><sup>Rp</sup>{{ $product->price }}</h3>
                                        <hr>
                                        <p>{{ $product->stock }} left</p>
                                        @if (!Auth::user()->is_admin)
                                            <form action="{{ route('add_to_cart', $product) }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" name="amount" value="1"
                                                        class="form-control me-2  rounded " style="width: 50%">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="submit">
                                                            <svg width="14px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2 3H4.5L6.5 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM6.07142 14H18L21 5H4.78571M11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 17.8954 7.89543 17 9 17C10.1046 17 11 17.8954 11 19Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ route('edit_product', $product) }}" method="get">
                                                <button class="btn btn-primary" type="submit">Ubah Produk</button>
                                            </form>
                                        @endif

                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Bagian Produk --}}
                        {{-- Bagian Komentar --}}
                        <div class="mb-5 ">
                            <p class="fs-3 mt-4">Komentar</p>
                            {{-- Komentar --}}
                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>

                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>

                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        @csrf
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>

                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>

                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>

                            <div class="border border-1 p-4 rounded-2 mb-2 ">
                                {{-- Komentar User --}}
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        {{-- Profile User --}}
                                        <div class="">
                                            <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                style="width: 48px" class="rounded-circle">
                                        </div>
                                        <div class="ms-2 fw-semibold">
                                            <p class="m-0">Rafi Ahmad</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="m-0">WAHHHHH MATAP SEKALI RASA KOPI INI TEMAN TEMAN SANGAT WORTH IT
                                            BUAT
                                            DI
                                            COBA, PASTI
                                            TIDAK MENYESAL</p>
                                    </div>
                                </div>
                                {{-- Komentar User --}}
                                {{-- Toggle --}}
                                <div class="d-flex justify-content-between mt-2">
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyForm"
                                        class="btn border-0 text-primary d-none p-0">
                                        Balas
                                    </button>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#replyAdmin1"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center ">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Toggle --}}
                                {{-- Komentar Admin --}}
                                {{-- Form Balas --}}
                                <div class="mt-2">
                                    <form id="replyForm" action="" method="post" class="collapse ">
                                        <input type="text" class="form-control">
                                        <div class="d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- Form Balas --}}

                                {{-- Tampil Komentar Admin --}}
                                <div id="replyAdmin1" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <div class="d-flex align-items-center">
                                            {{-- Profile User --}}
                                            <div class="">
                                                <img src="{{ asset('images/1712583090.jpeg') }}" alt=""
                                                    style="width: 48px" class="rounded-circle">
                                            </div>
                                            <div class="ms-2 fw-semibold">
                                                <p class="m-0">Opung Waffle Chinatown (Admin)</p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <p class="m-0">Terimkasih Sudah berkunjung :)</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tampil Komentar Admin --}}

                                {{-- Komentar Admin --}}
                            </div>
                            {{-- Komentar --}}


                        </div>
                    </div>

                </div>
            </div>
        @endsection
    </body>

</html>
