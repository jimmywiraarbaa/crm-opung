@extends('layouts.app')

@section('content')
    <div class="d-flex vh-100">
        {{-- SideBar --}}
        @include('admin.layouts.dash_nav')
        {{-- SideBar --}}

        {{-- Content --}}
        <div class="w-75 ms-2 overflow-y-scroll">
            @include('admin.layouts.dash_heading')

            <div class="p-4 pt-0 ">
                <button class="btn btn-opung mb-5 ">Cetak Laporan</button>
                <table class="table">
                    <thead class="table-primary">
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>12 April 2023</td>
                            <td>Jimmy Wira Arba'</td>
                            <td>Rp. 0</td>
                            <td>Rp. 72.000</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>14 Mei 2023</td>
                            <td>Anna Maria</td>
                            <td>Rp. 0</td>
                            <td>Rp. 120.000</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>20 Juni 2023</td>
                            <td>Alexander</td>
                            <td>Rp. 10.000</td>
                            <td>Rp. 200.000</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>5 Juli 2023</td>
                            <td>Dewi Susanti</td>
                            <td>Rp. 0</td>
                            <td>Rp. 80.000</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>10 Agustus 2023</td>
                            <td>Bayu Pratama</td>
                            <td>Rp. 0</td>
                            <td>Rp. 50.000</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>25 September 2023</td>
                            <td>Maria Clara</td>
                            <td>Rp. 10.000</td>
                            <td>Rp. 300.000</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>3 Oktober 2023</td>
                            <td>Haris Darmawan</td>
                            <td>Rp. 0</td>
                            <td>Rp. 140.000</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>11 November 2023</td>
                            <td>Siska Putri</td>
                            <td>Rp. 0</td>
                            <td>Rp. 100.000</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>21 Desember 2023</td>
                            <td>Rizki Rahmat</td>
                            <td>Rp. 0</td>
                            <td>Rp. 60.000</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>2 Januari 2024</td>
                            <td>Yuni Sari</td>
                            <td>Rp. 10.000</td>
                            <td>Rp. 180.000</td>
                        </tr>

                        <tr>
                            <th scope="row">11</th>
                            <td>15 Februari 2024</td>
                            <td>Aulia Rahman</td>
                            <td>Rp. 0</td>
                            <td>Rp. 120.000</td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td>20 Maret 2024</td>
                            <td>Budi Santoso</td>
                            <td>Rp. 0</td>
                            <td>Rp. 90.000</td>
                        </tr>
                        <tr>
                            <th scope="row">13</th>
                            <td>7 April 2024</td>
                            <td>Indah Sari</td>
                            <td>Rp. 10.000</td>
                            <td>Rp. 160.000</td>
                        </tr>
                        <tr>
                            <th scope="row">14</th>
                            <td>10 Mei 2024</td>
                            <td>Joko Purwanto</td>
                            <td>Rp. 0</td>
                            <td>Rp. 110.000</td>
                        </tr>
                        <tr>
                            <th scope="row">15</th>
                            <td>22 Juni 2024</td>
                            <td>Siti Rahayu</td>
                            <td>Rp. 0</td>
                            <td>Rp. 130.000</td>
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
        {{-- Content --}}
    </div>
@endsection
