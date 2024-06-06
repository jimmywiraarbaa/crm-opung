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
                <div class="">
                    <h2>Diskon yang diberikan :</h2>
                    <p class="fs-1">Rp.10000</p>
                </div>
                <div class="">
                    <h2>Batas Minimal Belanja :</h2>
                    <p class="fs-1">Rp.100000</p>
                </div>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
