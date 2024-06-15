@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2 overflow-y-scroll">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0 ">
                <button class="btn btn-opung mb-5 ">Cetak Laporan</button>
                <table class="table">
                    <thead class="table-primary">
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Bayar</th>
                        </tr>
                    </thead>
                    @foreach ($reports->reverse() as $report)
                        <tr>
                            <th scope="row">{{ $report->order_id }}</th>
                            <td>{{ $report->created_at->isoFormat('D MMMM YYYY HH:mm:ss') }} WIB</td>

                            <td>{{ $report->order->user->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($report->order->transactions as $transaction)
                                        <li>{{ $transaction->product->name }} -
                                            Rp.{{ number_format($transaction->product->price, 0, ',', '.') }} -
                                            {{ $transaction->amount }} pcs</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>Rp.{{ number_format($report->order->discount, 0, ',', '.') }}</td>
                            <td>Rp.{{ number_format($report->order->pay_price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
