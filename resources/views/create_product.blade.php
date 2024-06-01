@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input class="form-control" type="text" name="name" placeholder="Nama Produk"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori Produk</label>
                                <select class="form-select" name="category" aria-label="Default select example" required>
                                    <option selected>-- Pilih kategori --</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>


                            <div class="form-group mt-2">
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
                            <button class="btn btn-primary mt-2" type="submit">Tambah Produk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
