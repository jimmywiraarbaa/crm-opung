@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        @foreach ($orders->reverse() as $order)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="{{ route('show_order', $order) }}" class="text-decoration-none">
                                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                                    </a>

                                    <h6 class="card-subtitle mb-2 text-muted">by {{ $order->user->name }}</h6>
                                    <p>{{ $order->created_at->isoFormat('D MMMM YYYY') }}</p>
                                    <p>{{ $order->created_at->isoFormat('HH:mm') }} WIB</p>
                                    @if ($order->is_paid == true)
                                        <p class="card-text text-success">Terbayar</p>
                                    @else
                                        <p class="card-text text-danger">Belum Bayar</p>
                                        @if ($order->payment_receipt)
                                            <div class="d-flex flex-row justify-content-around">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Tampilkan Kwitansi
                                                </button>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Bukti Pembayaran</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{-- Tampilkan Gambar payment receipt disini --}}
                                                                <img src="{{ url('storage/' . $order->payment_receipt) }}"
                                                                    class="img-fluid" alt="Bukti Pembayaran">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Modal --}}
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">Konfirmasi</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                    @if ($order->is_paid == true && Auth::user()->is_admin == false)
                                        <a href="{{ route('create_comment', $order) }}" class="btn btn-primary">Ulasan</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
