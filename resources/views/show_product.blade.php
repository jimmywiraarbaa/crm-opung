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
                        <div class="card">
                            <div class="card-header">{{ __('Produk Detail') }}</div>

                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <div class="">
                                        <img src="{{ url('storage/' . $product->image) }}" alt="" width="200px">
                                    </div>

                                    <div>
                                        <a class="text-decoration-none" href="{{ route('index_product') }}">&lt;
                                            Kembali</a><br>
                                        <h1>{{ $product->name }}</h1>
                                        <h6>{{ $product->description }}</h6>
                                        <h3><sup>Rp</sup>{{ $product->price }}</h3>
                                        <hr>
                                        <p>{{ $product->stock }} left</p>
                                        @if (!Auth::user()->is_admin)
                                            <form action="{{ route('add_to_cart', $product) }}" method="post">
                                                @csrf
                                                <div class="input-group m-3">
                                                    <input class="form-control me-2  rounded" type="number" name="amount"
                                                        value="1" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="submit">Tambah ke
                                                            keranjang</button>
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
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
