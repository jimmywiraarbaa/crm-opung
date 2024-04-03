<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menu</title>
    </head>

    <body>
        @extends('layouts.app')

        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="input-group mb-3 justify-content-end">
                            <form action="{{ route('search_product') }}" method="get" class="d-flex">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <button class="btn btn-primary ms-2" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">{{ __('Menu') }}</div>

                            <!-- Tambahkan tombol filter -->
                            <div class="d-flex flex-row justify-content-around my-3" role="group"
                                aria-label="Basic example">
                                <a href="{{ route('index_product') }}"
                                    class="border rounded px-5 py-2 nav-link{{ !request()->has('category') ? ' text-white bg-primary' : '' }}">Semua</a>
                                <a href="{{ route('index_product', ['category' => 'Makanan']) }}"
                                    class="border rounded px-5 py-2 nav-link{{ request()->category === 'Makanan' ? ' text-white bg-primary' : '' }}">Makanan</a>
                                <a href="{{ route('index_product', ['category' => 'Minuman']) }}"
                                    class="border rounded px-5 py-2 nav-link{{ request()->category === 'Minuman' ? ' text-white bg-primary' : '' }}">Minuman</a>
                            </div>

                            <div class="card-group m-auto">
                                @foreach ($products as $product)
                                    <div class="card m-3" style="width: 18rem">
                                        <img class="card-img-top" src="{{ url('storage/' . $product->image) }}"
                                            alt="">
                                        <div class="card-body">
                                            <p class="card-text fs-5  fw-semibold ">{{ $product->name }}</p>
                                            <p class="card-text"><sup>Rp</sup>{{ $product->price }}</p>
                                            <div class="d-flex justify-content-between">
                                                <form action="{{ route('show_product', $product) }}" method="get">
                                                    <button class="btn btn-primary" type="submit">Detail</button>
                                                </form>
                                                @if (Auth::check() && Auth::user()->is_admin)
                                                    <form action="{{ route('delete_product', $product) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
