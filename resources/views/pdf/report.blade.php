<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <style>
            /* CSS untuk tabel */
            .custom-table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                font-size: 16px;
                text-align: left;
            }

            /* CSS untuk header tabel */
            .custom-table-header {
                background-color: #007bff;
                /* Warna biru bootstrap */
                color: white;
            }

            /* CSS untuk sel header */
            .custom-table-header th {
                padding: 12px 15px;
                border: 1px solid #dee2e6;
            }

            /* CSS untuk sel tubuh tabel */
            .custom-table tbody td,
            .custom-table tbody th {
                padding: 12px 15px;
                border: 1px solid #dee2e6;
            }

            /* CSS untuk baris tubuh tabel */
            .custom-table tbody tr {
                border-bottom: 1px solid #dee2e6;
            }

            /* CSS untuk zebra striping */
            .custom-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }

            /* CSS untuk elemen list dalam sel */
            .custom-table tbody ul {
                padding-left: 4px;
                margin: 0;
            }

            .custom-table tbody li {
                margin: 0;
                padding: 0;
            }

            /* CSS untuk header baris */
            .custom-table tbody th {
                background-color: #f8f9fa;
            }
        </style>
        <title>Cetak Laporan</title>
    </head>

    <body>
        <h2>Laporan Penjualan Opung Waffle Chinatown Cofee</h2>

        <table class="custom-table">
            <thead class="custom-table-header">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports->reverse() as $report)
                    <tr>
                        <th scope="row">{{ $report->order_id }}</th>
                        <td>{{ $report->created_at->isoFormat('D MMMM YYYY HH:mm:ss') }} WIB</td>
                        <td>{{ $report->order->user->name }}</td>
                        <td>
                            <ul>
                                @foreach ($report->order->transactions as $transaction)
                                    <li>{{ $transaction->product->name }} -
                                        Rp.{{ number_format($transaction->product->price, 0, ',', '.') }} -
                                        {{ $transaction->amount }} pcs
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp.{{ number_format($report->order->discount, 0, ',', '.') }}</td>
                        <td>Rp.{{ number_format($report->order->pay_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </body>

</html>
