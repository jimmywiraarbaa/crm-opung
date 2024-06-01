@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori Produk</label>
                                <select class="form-select" name="category" aria-label="Default select example" required>
                                    <option value="Makanan" {{ $product->category === 'Makanan' ? 'selected' : '' }}>Makanan
                                    </option>
                                    <option value="Minuman" {{ $product->category === 'Minuman' ? 'selected' : '' }}>Minuman
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="description">Deskripsi Produk</label>
                                <input class="form-control" type="text" name="description"
                                    value="{{ $product->description }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="price">Harga Produk</label>
                                <input class="form-control" type="number" name="price" value={{ $product->price }}>
                            </div>

                            <div class="form-group mt-2">
                                <label for="stock">Stok Produk</label>
                                <input class="form-control" type="number" name="stock" value={{ $product->stock }}>
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
