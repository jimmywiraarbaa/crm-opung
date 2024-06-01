@extends('layouts.app')
@section('external-css')
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ulasan') }}</div>
                    <div class="card-body">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="">
                                    @foreach ($order->transactions as $transaction)
                                        <form action="{{ route('store_comment', ['order' => $order->id]) }}" method="post">

                                            @csrf
                                            <div class="d-flex justify-content-center mb-2 ">
                                                <img src="{{ url('storage/' . $transaction->product->image) }}"
                                                    alt="{{ $transaction->product->name }}" class="w-25 rounded-4 ">
                                            </div>
                                            <h3 class="text-center ">{{ $transaction->product->name }}</h3>
                                            <input type="hidden" name="product_ids[]"
                                                value="{{ $transaction->product->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="form-group mb-3">
                                                <div class="d-flex justify-content-center">
                                                    <div class="rating">
                                                        <input type="radio" id="star5_{{ $transaction->product->id }}"
                                                            name="ratings[{{ $transaction->product->id }}]"
                                                            value="5" />
                                                        <label class="star" for="star5_{{ $transaction->product->id }}"
                                                            title="Awesome" aria-hidden="true"></label>
                                                        <input type="radio" id="star4_{{ $transaction->product->id }}"
                                                            name="ratings[{{ $transaction->product->id }}]"
                                                            value="4" />
                                                        <label class="star" for="star4_{{ $transaction->product->id }}"
                                                            title="Great" aria-hidden="true"></label>
                                                        <input type="radio" id="star3_{{ $transaction->product->id }}"
                                                            name="ratings[{{ $transaction->product->id }}]"
                                                            value="3" />
                                                        <label class="star" for="star3_{{ $transaction->product->id }}"
                                                            title="Very good" aria-hidden="true"></label>
                                                        <input type="radio" id="star2_{{ $transaction->product->id }}"
                                                            name="ratings[{{ $transaction->product->id }}]"
                                                            value="2" />
                                                        <label class="star" for="star2_{{ $transaction->product->id }}"
                                                            title="Good" aria-hidden="true"></label>
                                                        <input type="radio" id="star1_{{ $transaction->product->id }}"
                                                            name="ratings[{{ $transaction->product->id }}]"
                                                            value="1" />
                                                        <label class="star" for="star1_{{ $transaction->product->id }}"
                                                            title="Bad" aria-hidden="true"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Komentar</label>
                                                <textarea name="contents[{{ $transaction->product->id }}]" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
