<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menambah Produk</title>
    </head>

    <body>
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
                                        <input class="form-control" type="text" name="name" placeholder="Nama Produk">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="description">Deskripsi Produk</label>
                                        <input class="form-control" type="text" name="description"
                                            placeholder="Deskripsi Produk">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="price">Harga Produk</label>
                                        <input class="form-control" type="number" name="price"
                                            placeholder="Harga Produk">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="stock">Stok Produk</label>
                                        <input class="form-control" type="number" name="stock" placeholder="Stok Produk">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="file">Gambar Produk</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <button class="btn btn-primary mt-2" type="submit">Tambah Produk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
