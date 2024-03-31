<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit {{ $product->name }}</title>
    </head>

    <body>
        @extends('layouts.app')
        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Update Product') }}</div>

                            <div class="card-body">
                                <form action="{{ route('update_product', $product) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama Produk</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="description">Deskripsi Produk</label>
                                        <input class="form-control" type="text" name="description"
                                            value="{{ $product->description }}">
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="price">Harga Produk</label>
                                        <input class="form-control" type="number" name="price"
                                            value={{ $product->price }}>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="stock">Stok Produk</label>
                                        <input class="form-control" type="number" name="stock"
                                            value={{ $product->stock }}>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="image">Gambar Produk</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>

                                    <button class="btn btn-primary mt-2" type="submit">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
