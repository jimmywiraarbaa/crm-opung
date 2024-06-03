@extends('layouts.app')
@section('content')
    @include('layouts.nav')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Bagian Produk --}}
                <div class="card">
                    <div class="card-header">{{ __('Produk Detail') }}</div>

                    <div class="card-body">
                        <div class="d-flex flex-column justify-content-around flex-lg-row">

                            <div class="d-flex flex-column mb-3 me-lg-4 ">
                                <a class="text-decoration-none" href="{{ route('index_product') }}">&lt;
                                    Kembali</a><br>
                                <div class="d-flex justify-content-center">
                                    <img src="{{ url('storage/' . $product->image) }}" alt="" width="200px"
                                        class="rounded ">
                                </div>
                            </div>

                            <div>
                                <h1>{{ $product->name }}</h1>
                                <h6>{{ $product->description }}</h6>
                                <h3><sup>Rp</sup>{{ $product->price }}</h3>
                                <hr>
                                <p>{{ $product->stock }} left</p>
                                @if (!Auth::user()->is_admin)
                                    <form action="{{ route('add_to_cart', $product) }}" method="post">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="amount" value="1"
                                                class="form-control me-2  rounded " style="width: 50%">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <svg width="14px" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2 3H4.5L6.5 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM6.07142 14H18L21 5H4.78571M11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 17.8954 7.89543 17 9 17C10.1046 17 11 17.8954 11 19Z"
                                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('edit_product', $product) }}" method="get">
                                        <button class="btn btn-primary" type="submit">Ubah Produk</button>
                                    </form>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Bagian Produk --}}
                {{-- Bagian Komentar --}}
                <div class="mb-5 ">
                    <p class="fs-3 mt-4">Komentar</p>
                    {{-- Komentar --}}
                    @foreach ($product->comments()->orderBy('created_at', 'desc')->get() as $comment)
                        <div class="border border-1 p-4 rounded-2 mb-2 ">
                            {{-- Komentar User --}}
                            <div class="">
                                {{-- Profile User --}}
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <img src="{{ asset('/images/' . $comment->user->profile_picture) }}" alt=""
                                            style="width: 48px; height: 48px;" class="rounded-circle">
                                    </div>
                                    <div class="ms-2 fw-semibold">
                                        <p class="m-0">{{ $comment->user->name }}</p>
                                    </div>
                                </div>
                                {{-- Profile User --}}

                                {{-- Star Rating --}}
                                <div class="d-flex mt-2 align-items-center">
                                    <div class="">
                                        @for ($i = 1; $i <= $comment->rating; $i++)
                                            <svg width="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                                                    fill="#FFFF00" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <div class="">
                                        <p style="font-size: 12px" class="m-0 text-secondary ms-2">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>

                                    </div>
                                </div>
                                {{-- Star Rating --}}

                                <div class="mt-2">
                                    <p class="m-0">{{ $comment->content }}</p>
                                </div>
                            </div>
                            {{-- Komentar User --}}
                            {{-- Toggle --}}
                            <div class="d-flex justify-content-between mt-2">
                                @if (Auth::user()->is_admin)
                                    <button type="button" data-bs-toggle="collapse"
                                        data-bs-target="#replyForm-{{ $comment->id }}"
                                        class="btn border-0 text-primary p-0">
                                        Balas
                                    </button>
                                @endif
                                <div class="">
                                    <button type="button" data-bs-toggle="collapse"
                                        data-bs-target="#replyAdmin-{{ $comment->id }}"
                                        class="btn border-0 text-secondary p-0 d-flex align-items-center">
                                        <p class="m-0 me-2">Respon Admin</p>
                                        <svg width="12px" viewBox="0 -4.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-180.000000, -6684.000000)" fill="#6c757d">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M144,6525.39 L142.594,6524 L133.987,6532.261 L133.069,6531.38 L133.074,6531.385 L125.427,6524.045 L124,6525.414 C126.113,6527.443 132.014,6533.107 133.987,6535 C135.453,6533.594 134.024,6534.965 144,6525.39"
                                                            id="arrow_down-[#339]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            {{-- Toggle --}}
                            {{-- Komentar Admin --}}
                            {{-- Form Balas --}}
                            <div class="mt-2">
                                <form action="{{ route('store_reply', ['product' => $product->id]) }}" method="post"
                                    id="replyForm-{{ $comment->id }}" class="collapse">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <label for="content">Balas:</label>
                                    <input type="text" class="form-control" name="content" required>
                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                            {{-- Form Balas --}}


                            {{-- Tampil Komentar Admin --}}

                            @if ($comment->replies->isEmpty())
                                <div id="replyAdmin-{{ $comment->id }}" class="mt-3 collapse">
                                    <div class="bg-body-secondary p-4 rounded">
                                        <p class="m-0">Belum ada balasan dari admin untuk komentar ini.</p>
                                    </div>
                                </div>
                            @else
                                @foreach ($comment->replies as $reply)
                                    <div id="replyAdmin-{{ $comment->id }}" class="mt-3 collapse">
                                        <div class="bg-body-secondary p-4 rounded">
                                            <div class="d-flex align-items-center">
                                                {{-- Profile User --}}
                                                <div class="">
                                                    <img src="{{ asset('images/' . $reply->user->profile_picture) }}"
                                                        alt="" style="width: 48px" class="rounded-circle">
                                                </div>
                                                <div class="ms-2 fw-semibold">
                                                    <p class="m-0">{{ $reply->user->name }} (Admin)</p>
                                                </div>
                                            </div>
                                            {{-- Isi Balasan --}}
                                            <div class="mt-4">
                                                <p class="m-0">{{ $reply->content }}</p>
                                            </div>
                                            {{-- Isi Balasan --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{-- Tampil Komentar Admin --}}


                            {{-- Komentar Admin --}}
                        </div>
                    @endforeach
                    {{-- Komentar --}}


                </div>
            </div>

        </div>
    </div>
@endsection
