@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- End SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2 overflow-y-scroll">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0">
                @php
                    // Inisialisasi total harga
                    $total_price = 0;
                @endphp

                <div class="card-body">
                    <a href="{{ route('order_dashboard') }}" class="text-decoration-none fs-5">
                        &lt; Kembali
                    </a>
                    <h5 class="card-title mt-2">Order ID {{ $order->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $order->user->name }}</h6>

                    @if ($order->is_paid)
                        <p class="card-text text-success">Terbayar</p>
                    @else
                        <p class="card-text text-danger">Belum Bayar</p>
                    @endif

                    <hr>

                    {{-- Daftar Transaksi dalam Order --}}
                    @foreach ($order->transactions as $transaction)
                        <div class="d-flex justify-content-between">
                            <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                            <p><sup>Rp</sup>{{ number_format($transaction->product->price * $transaction->amount, 0) }}</p>
                        </div>
                        @php
                            $total_price += $transaction->product->price * $transaction->amount;
                        @endphp
                    @endforeach

                    <hr>

                    {{-- Menampilkan Diskon jika Ada --}}
                    @if ($diskon == 0)
                        <p class="fw-bold">Total Bayar :
                            <span class="text-success"><sup>Rp</sup>{{ number_format($total_price, 0) }}</span>
                        </p>
                    @else
                        <p class="fw-bold">Bayar :
                            <span
                                class="text-danger text-decoration-line-through"><sup>Rp</sup>{{ number_format($total_price, 2) }}</span>
                        </p>
                        <p class="fw-bold">Diskon :
                            <span class="text-success"><sup>Rp</sup>{{ number_format($diskon, 0) }}</span>
                        </p>
                        <p class="fw-bold">Total Bayar :
                            <span class="text-success"><sup>Rp</sup>{{ number_format($total_price - $diskon, 0) }}</span>
                        </p>
                    @endif

                    <hr>

                    {{-- Tombol Cetak Struk PDF --}}
                    <a href="{{ route('pdf_order_show_dashboard', $order) }}?export=pdf" class="btn btn-primary"
                        target="_blank">
                        Cetak Struk
                    </a>

                    {{-- Informasi QRIS jika Bukan Admin --}}
                    @if (!Auth::user()->is_admin)
                        <p class="mb-0">Scan QRIS :</p>
                        <img src="{{ asset('images/kodeqr.png') }}" alt="QR Code">
                        <p class="text-muted mb-0">*Jangan lupa Screenshot bukti bayar</p>
                        <a href="{{ asset('images/kodeqr.png') }}" download class="btn btn-success">Download QR</a>
                    @endif

                    {{-- Form Upload Bukti Pembayaran --}}
                    @if (!$order->is_paid && is_null($order->payment_receipt) && !Auth::user()->is_admin)
                        <form action="{{ route('submit_payment_receipt', $order->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="payment_receipt">Upload Bukti Bayar</label>
                                <input class="form-control" type="file" name="payment_receipt" id="payment_receipt">
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Konfirmasi Pembayaran</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        {{-- End Content --}}
    </div>
@endsection
