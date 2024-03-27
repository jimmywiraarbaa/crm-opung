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
            <p>{{ $product->description }}</p>
            <p><sup>Rp</sup>{{ $product->price }}</p>
            <p>{{ $product->stock }}</p>
            <img src="{{ url('storage/' . $product->image) }}" alt="" class="w-25 ">
        @endforeach
    </body>

</html>
