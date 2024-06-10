<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cetak struk</title>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .container {
                margin: 0 auto;
                border: 1px solid #ccc;
                padding: 10px;
            }

            .header {
                text-align: center;
            }

            .title {
                font-size: 20px;
                margin-bottom: 5px;
            }

            .subtitle {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .item {
                margin-bottom: 5px;
            }

            .price-product span {
                float: right
            }

            .total {
                font-weight: bold;
                border-top: 1px solid #ccc;
                padding-top: 5px;
            }

            .total span {
                float: right;
            }

            hr {
                border: none;
                border-top: 1px dashed #ccc;
                margin: 10px 0;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h2 class="title">OPUNG WAFFLE CHINATOWN COFFEE</h2>
                <p class="subtitle">Struk Pembelian</p>
            </div>
            <hr>
            <div class="content">
                <div class="item">
                    <p>{{ $order->created_at }}</p>
                    <p>Order ID: {{ $order->id }}</p>
                    <p>Nama: {{ $order->user->name }}</p>
                    @if ($order->is_paid)
                        <p>Status: <span style="color: green;">Terbayar</span></p>
                    @else
                        <p>Status: <span style="color: red;">Belum Bayar</span></p>
                    @endif
                </div>
                <hr>
                <div class="items">
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach ($order->transactions as $transaction)
                        <div class="price-product">
                            <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs
                                <span>Rp{{ number_format($transaction->product->price * $transaction->amount, 0) }}</span>
                            </p>
                        </div>
                        @php
                            $total_price += $transaction->product->price * $transaction->amount;
                        @endphp
                    @endforeach
                </div>
                <hr>
                <div class="total">
                    @if ($diskon == 0)
                        <p>Total Bayar: <span>Rp{{ number_format($total_price, 0) }}</span></p>
                    @else
                        <p>Bayar: <span
                                style="text-decoration: line-through;">Rp{{ number_format($total_price, 0) }}</span></p>
                        <p>Diskon: <span>Rp{{ number_format($diskon, 0) }}</span></p>
                        <p>Total Bayar: <span>Rp{{ number_format($total_price - $diskon, 0) }}</span></p>
                    @endif
                </div>
            </div>
        </div>
    </body>

</html>
