<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ulasan</title>
        <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    </head>

    <body>
        @extends('layouts.app')

        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Ulasan') }}</div>
                            <div class="card-body">
                                <div class="card w-100">
                                    <div class="card-body">
                                        @foreach ($order->transactions as $transaction)
                                            <div class="">
                                                <div class="d-flex justify-content-center mb-2 ">
                                                    <img src="{{ url('storage/' . $transaction->product->image) }}"
                                                        alt="{{ $transaction->product->name }}" class="w-25 rounded-4 ">
                                                </div>
                                                <h3 class="text-center ">{{ $transaction->product->name }}</h3>
                                                <form action="" method="post">
                                                    @csrf
                                                    <input type="number" class="d-none " name="product_id"
                                                        value="{{ $transaction->product->id }}">
                                                    <input type="number" value="{{ Auth::user()->id }}" name="user_id"
                                                        class="d-none">
                                                    <div class="form-group mb-3">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="rating">
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5" />
                                                                <label class="star" for="star5" title="Awesome"
                                                                    aria-hidden="true"></label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4" />
                                                                <label class="star" for="star4" title="Great"
                                                                    aria-hidden="true"></label>
                                                                <input type="radio" id="star3" name="rating"
                                                                    value="3" />
                                                                <label class="star" for="star3" title="Very good"
                                                                    aria-hidden="true"></label>
                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2" />
                                                                <label class="star" for="star2" title="Good"
                                                                    aria-hidden="true"></label>
                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1" />
                                                                <label class="star" for="star1" title="Bad"
                                                                    aria-hidden="true"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Komentar</label>
                                                        <textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

</html>
