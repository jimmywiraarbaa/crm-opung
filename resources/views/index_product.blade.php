@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group mb-3 justify-content-end">
                    <form action="{{ route('search_product') }}" method="get" class="d-flex">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <button class="btn btn-primary ms-2 d-flex align-items-center" type="submit">
                            <svg width="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                                    stroke="#FFF9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>

                    <!-- Tambahkan tombol filter -->
                    <div class="d-flex flex-row justify-content-around my-3" role="group" aria-label="Basic example">
                        <a href="{{ route('index_product') }}"
                            class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ !request()->has('category') ? ' text-white bg-primary' : '' }}">Semua</a>
                        <a href="{{ route('index_product', ['category' => 'Makanan']) }}"
                            class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ request()->category === 'Makanan' ? ' text-white bg-primary' : '' }}">Makanan</a>
                        <a href="{{ route('index_product', ['category' => 'Minuman']) }}"
                            class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ request()->category === 'Minuman' ? ' text-white bg-primary' : '' }}">Minuman</a>
                    </div>

                    <div class="px-5">
                        @if (isset($message))
                            <div class="alert alert-danger">{{ $message }}</div>
                        @endif
                    </div>

                    <div class="card-group m-auto px-2 px-md-4 ">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                            @foreach ($products as $product)
                                <div class="col mb-md-4 mb-2">
                                    <div class="card d-flex flex-md-column flex-row">
                                        <div class="row">
                                            <div
                                                class="col-md-12 col-4 d-flex justify-content-center align-items-center text-center">
                                                <img class="card-img-top rounded-0 ms-md-0 ms-3"
                                                    src="{{ url('storage/' . $product->image) }}" alt="">
                                            </div>
                                            <div class="col-md-12 col-8">
                                                <div class="card-body">
                                                    <h5 class="card-title ">{{ $product->name }}</h5>
                                                    <p class="card-text"><sup>Rp</sup>{{ $product->price }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="">
                                                            @if (Auth::check() && Auth::user()->is_admin)
                                                                <form action="{{ route('delete_product', $product) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Hapus</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-end align-items-end">
                                                            <form action="{{ route('show_product', $product) }}"
                                                                method="get">
                                                                <button class="btn btn-primary fw-bold"
                                                                    type="submit">+</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
