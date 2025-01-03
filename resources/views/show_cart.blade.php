@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container my-4">
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
                                                    <button class="btn btn-outline-secondary ms-2 " type="submit">Ubah
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
                            @if ($total_price >= $batas_discount)
                                <h6 class="fs-6 mb-3">Diskon : <span
                                        class="text-success fw-bold"><sup>Rp</sup>{{ $diskon }}</span></h6>
                                <h6 class="fs-6 mb-3">Bayar : <span
                                        class="text-danger fw-bold text-decoration-line-through"><sup>Rp</sup>{{ $total_price }}</span>
                                </h6>
                                <h5 class="fs-5 mb-3">Total Bayar : <span
                                        class="text-success fw-bold"><sup>Rp</sup>{{ $total_price - $diskon }}</span></h5>
                            @else
                                <h5 class="fs-5 mb-3">Total Bayar : <span
                                        class="text-success fw-bold"><sup>Rp</sup>{{ $total_price }}</span></h5>
                            @endif
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <input type="number" name="discount"
                                    value="{{ $total_price >= $batas_discount ? $diskon : 0 }}"
                                    class="form-control d-none">
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
