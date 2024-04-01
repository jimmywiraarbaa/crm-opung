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
                        <div class="card">
                            <div class="card-header">{{ __('Menu') }}</div>

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
