@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2 ">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0 ">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="rounded-4 pt-3 ps-4 shadow" style="height: 14rem">
                            <div class="mb-3">
                                <p class="fw-medium fs-4 ">Penjualan Hari Ini</p>
                            </div>
                            <div class="">
                                <p class="m-0 p-0 fs-1">Rp.1500000</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="rounded-4 pt-3 ps-4 shadow" style="height: 14rem">
                            <div class="">
                                <p class="fw-medium fs-4 ">Total Orderan Hari Ini</p>
                            </div>
                            <div class="text-center">
                                <p class="fs-1">{{ $total_order }}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="rounded-4 pt-3 ps-4 shadow" style="height: 14rem">
                            <p class="fw-medium fs-4 ">Jumlah Menu</p>
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <p class="fs-1 fw-medium m-0">{{ $total_product }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="d-flex flex-column rounded-4 shadow p-2" style="height: 14rem">
                            <div class="mb-3 ">
                                <p class="fw-medium fs-4 mt-3 ms-4 ">Batas Diskon</p>
                            </div>

                            <div class="d-flex justify-content-between  align-items-end  p-2">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
