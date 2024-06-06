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
                    <p class="fs-1">Rp.{{ number_format($discounts->discount, 0, ',', '.') }}</p>
                </div>
                <div class="">
                    <h2>Batas Minimal Belanja :</h2>
                    <p class="fs-1">Rp.{{ number_format($discounts->discount_limit, 0, ',', '.') }}</p>
                </div>
                <hr class="mb-4">
                <div class="d-flex ">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Ubah batas diskon dan banyak diskon
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Diskon</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('update_discount') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="discount" class="mb-2">Diskon yang diberikan</label>
                                            <input id="discount" type="number" name="discount"
                                                value="{{ $discounts->discount }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="mb-2">Batas minimal belanja</label>
                                            <input id="discount" type="number" name="discount_limit"
                                                value="{{ $discounts->discount_limit }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
