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
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Bayar</th>
                        </tr>
                    </thead>
                    @foreach ($reports as $report)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $report->id }}</th>
                                <td>{{ $report->created_at->isoFormat('D MMMM YYYY') }}</td>
                                <td></td>
                                <td>Rp. {{ $report->discount }}</td>
                                <td>Rp. 72.000</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
