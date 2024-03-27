<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail - {{ $product->name }}</title>
    </head>

    <body>
        <a href="{{ route('index_product') }}">&lt;Kembali</a><br>
        <b>{{ $product->name }}</b>
        <p>{{ $product->description }}</p>
        <p><sup>Rp</sup>{{ $product->price }}</p>
        <p>Stok : {{ $product->stock }}</p>
        <img src="{{ url('storage/' . $product->image) }}" alt="" height="100px">
    </body>

</html>
