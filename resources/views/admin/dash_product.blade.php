@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2 overflow-y-scroll">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0 ">
                {{-- Toggle --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    Tambah Menu
                </button>
                {{-- Toggle --}}

                {{-- Data Product --}}
                <div class="input-group mb-3 justify-content-end">
                    <form action="{{ route('dash_search_product') }}" method="get" class="d-flex">
                        <input type="text" class="form-control" name="dash_search" placeholder="Search">
                        <button class="btn btn-opung ms-2 d-flex align-items-center" type="submit">
                            <svg width="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                                    stroke="#FFF9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="d-flex flex-row justify-content-around my-3" role="group" aria-label="Basic example">
                    <a href="{{ route('product_dashboard') }}"
                        class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ !request()->has('category') ? ' text-white bg-opung' : '' }}">Semua</a>
                    <a href="{{ route('product_dashboard', ['category' => 'Makanan']) }}"
                        class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ request()->category === 'Makanan' ? ' text-white bg-opung' : '' }}">Makanan</a>
                    <a href="{{ route('product_dashboard', ['category' => 'Minuman']) }}"
                        class="border rounded px-lg-5 py-lg-2 px-md-4 py-md-2 px-3 py-1 nav-link{{ request()->category === 'Minuman' ? ' text-white bg-opung' : '' }}">Minuman</a>
                </div>

                <div class="px-5">
                    @if (isset($message))
                        <div class="alert alert-danger">{{ $message }}</div>
                    @endif
                </div>

                <div class="row mt-4">
                    @foreach ($products->reverse() as $product)
                        <div data-aos="fade-up" class="col-md-4 mb-4">
                            <div class="card" aria-hidden="true">
                                <img src="{{ url('storage/' . $product->image) }}" class="card-img-top" loading="lazy"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h5 class="card-title">Rp. {{ number_format($product->price, 0, ',', '.') }}</h5>
                                    <div class="d-flex flex-row justify-content-between">
                                        <form id="delete-form-{{ $product->id }}"
                                            action="{{ route('delete_product', $product) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-confirm"
                                                data-id="{{ $product->id }}">Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateMenu-{{ $product->id }}">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Update --}}
                        <div class="modal fade" id="updateMenu-{{ $product->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Dokter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('update_product', $product) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group mb-2">
                                                <label for="name" class="form-label ">Nama Menu</label>
                                                <input id="name" name="name" type="text" placeholder="Nama Menu"
                                                    value="{{ $product->name }}" class="form-control ">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="category">Kategori Menu</label>
                                                <select class="form-select" name="category"
                                                    aria-label="Default select example" required>
                                                    <option>-- Pilih kategori --</option>
                                                    <option value="Makanan"
                                                        {{ $product->category === 'Makanan' ? 'selected' : '' }}>Makanan
                                                    </option>
                                                    <option value="Minuman"
                                                        {{ $product->category === 'Minuman' ? 'selected' : '' }}>Minuman
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="description">Deskripsi Produk</label>
                                                <input class="form-control" type="text" name="description"
                                                    placeholder="Deskripsi Produk" value="{{ $product->description }}"
                                                    required>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="price">Harga Produk</label>
                                                <input class="form-control" type="number" name="price"
                                                    placeholder="Harga Produk" value="{{ $product->price }}" required>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="stock">Stok Produk</label>
                                                <input class="form-control" type="number" name="stock"
                                                    placeholder="Stok Produk" value="{{ $product->stock }}" required>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="file">Gambar Produk</label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal --}}
                    @endforeach

                </div>

                {{-- Data Dokter --}}
            </div>

        </div>
        {{-- Content --}}
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="name" class="form-label ">Nama Menu</label>
                            <input id="name" name="name" type="text" placeholder="Nama Menu"
                                class="form-control ">
                        </div>
                        <div class="form-group mb-2">
                            <label for="category">Kategori Menu</label>
                            <select class="form-select" name="category" aria-label="Default select example" required>
                                <option selected>-- Pilih kategori --</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Deskripsi Produk</label>
                            <input class="form-control" type="text" name="description" placeholder="Deskripsi Produk"
                                required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="price">Harga Produk</label>
                            <input class="form-control" type="number" name="price" placeholder="Harga Produk"
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="stock">Stok Produk</label>
                            <input class="form-control" type="number" name="stock" placeholder="Stok Produk"
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="file">Gambar Produk</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal --}}
@endsection
