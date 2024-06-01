<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Order</title>
    </head>

    <body>
        @extends('layouts.app')

        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Order Detail') }}</div>

                            @php
                                $total_price = 0;
                            @endphp

                            <div class="card-body">
                                <h5 class="card-title">Order ID {{ $order->id }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">by {{ $order->user->name }}</h6>
                                @if ($order->is_paid == true)
                                    <p class="card-text text-success">Terbayar</p>
                                @else
                                    <p class="card-text text-danger">Belum Bayar</p>
                                @endif
                                <hr>
                                @foreach ($order->transactions as $transaction)
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                                        <p><sup>Rp</sup>{{ $transaction->product->price * $transaction->amount }}</p>
                                    </div>
                                    @php
                                        $total_price += $transaction->product->price * $transaction->amount;
                                    @endphp
                                @endforeach
                                <hr>
                                <p class="fw-bold">Total Bayar : <span
                                        class="text-success"><sup>Rp</sup>{{ $total_price }}</span></p>
                                <hr>
                                <p>Scan QRIS :</p>
                                <img src="{{ asset('images/kodeqr.png') }}" alt="">
                                @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                                    <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="payment_receipt">Upload Bukti Bayar</label>
                                            <input class="form-control" type="file" name="payment_receipt"
                                                id="payment_receipt">
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">Konfirmasi Pembayaran</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
