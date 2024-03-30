<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Order</title>
    </head>

    <body>
        <p>ID: {{ $order->id }}</p>
        <p>by {{ $order->user->id }}</p>
        @foreach ($order->transactions as $transaction)
            <p>Produk: {{ $transaction->product->name }}</p>
            <p>Banyak: {{ $transaction->amount }}</p>
        @endforeach
        @if ($order->is_paid == false && $order->payment_receipt == null)
            <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="payment_receipt">Upload Bukti Bayar</label>
                <br>
                <input type="file" name="payment_receipt" id="payment_receipt">
                <br>
                <button type="submit">Konfirmasi Pembayaran</button>
            </form>
        @endif
    </body>

</html>
