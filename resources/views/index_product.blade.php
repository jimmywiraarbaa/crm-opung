<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Menu</title>
    </head>

    <body>
        <p>halo</p>
        @foreach ($products as $product)
            <p>{{ $product->name }}</p>
            <p><sup>Rp</sup>{{ $product->price }}</p>
            <img src="{{ url('storage/' . $product->image) }}" alt="" height="100px">
            <form action="{{ route('show_product', $product) }}" method="get">
                <button type="submit">Detail</button>
            </form>
        @endforeach
    </body>

</html>
