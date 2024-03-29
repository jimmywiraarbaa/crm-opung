<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Keranjang</title>
    </head>

    <body>
        @foreach ($carts as $cart)
            <img src="{{ url('storage/' . $cart->product->image) }}" alt="" height="100px">
            <p>{{ $cart->product->name }}</p>
            <p>{{ $cart->amount }}</p>
        @endforeach
    </body>

</html>
