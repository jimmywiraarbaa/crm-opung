@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2  overflow-y-scroll">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0">
                @php
                    $total_price = 0;
                @endphp

                <div class="card-body">
                    <a href="{{ route('order_dashboard') }}" class="text-decoration-none fs-5">
                        < Kembali </a>
                            <h5 class="card-title mt-2">Order ID {{ $order->id }}</h5>
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
                                    <p><sup>Rp</sup>{{ $transaction->product->price * $transaction->amount }}
                                    </p>
                                </div>
                                @php
                                    $total_price += $transaction->product->price * $transaction->amount;
                                @endphp
                            @endforeach
                            <hr>
                            @if ($diskon == 0)
                                <p class="fw-bold">Total Bayar : <span
                                        class="text-success"><sup>Rp</sup>{{ $total_price }}</span>
                                </p>
                            @else
                                <p class="fw-bold">Bayar : <span
                                        class="text-danger text-decoration-line-through"><sup>Rp</sup>{{ $total_price }}</span>
                                </p>
                                <p class="fw-bold">Diskon :
                                    <span class="text-success"><sup>Rp</sup>{{ $diskon }}</span>
                                </p>
                                <p class="fw-bold">Total Bayar : <span
                                        class="text-success"><sup>Rp</sup>{{ $total_price - $diskon }}</span>
                                </p>
                            @endif
                            <hr>

                            <button class="btn btn-primary">Cetak Struk</button>
                            @if (Auth::User()->is_admin == false)
                                <p class="mb-0">Scan QRIS :</p>
                                <img src="{{ asset('images/kodeqr.png') }}" alt="">
                                <p class="text-muted mb-0">*Jangan lupa Screenshot bukti bayar</p>
                                <a href="{{ asset('images/kodeqr.png') }}" download class="btn btn-success">
                                    Download QR
                                </a>
                            @endif
                            @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                                <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="payment_receipt">Upload Bukti Bayar</label>
                                        <input class="form-control" type="file" name="payment_receipt"
                                            id="payment_receipt">
                                    </div>
                                    <button class="btn btn-primary mt-3" type="submit">Konfirmasi
                                        Pembayaran</button>
                                </form>
                            @endif
                </div>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
