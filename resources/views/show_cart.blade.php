<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Keranjang</title>
    </head>

    <body>
        @extends('layouts.app')

        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Keranjang') }}</div>

                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                @endif

                                @php
                                    $total_price = 0;
                                @endphp

                                <div class="card-group m-auto">
                                    @foreach ($carts as $cart)
                                        <div class="card m-3" style="width: 14rem;">
                                            <img class="card-img-top" src="{{ url('storage/' . $cart->product->image) }}"
                                                alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $cart->product->name }}</h5>
                                                <h5 class="card-subtitle my-2"><sup>Rp</sup>{{ $cart->product->price }}</h5>
                                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <input class="form-control rounded" aria-describedby="basic-addon2"
                                                            type="number" name="amount" value={{ $cart->amount }}>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary ms-2 "
                                                                type="submit">Ubah
                                                                Jumlah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form action="{{ route('delete_cart', $cart) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                        @php
                                            $total_price += $cart->product->price * $cart->amount;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="d-flex flex-column justify-content-end align-items-end">
                                    <h5 class="fs-5 mb-3">Total Bayar : <span
                                            class="text-success fw-bold"><sup>Rp</sup>{{ $total_price }}</span></h5>
                                    <form action="{{ route('checkout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary" type="submit"
                                            @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
