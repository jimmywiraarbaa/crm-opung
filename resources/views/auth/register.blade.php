@extends('layouts.app')
@php
    $title = 'Daftar';
@endphp
@section('content')
    <section class="vh-100 bg-opung">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 py-lg-4 px-lg-5 text-black">

                                    <h2 class="fw-normal pb-1 text-center text-md-start" style="letter-spacing: 1px;">
                                        Pendaftaran
                                    </h2>

                                    <h6 class="text-opung mb-3">Hai, mari bergabung menjadi warga opung :D</h6>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="mb-2">
                                            <label for="name" class="">{{ __('Nama') }}</label>

                                            <div class="mt-2">
                                                <input id="name" type="text" placeholder="John"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="phone">Nomor HP</label>

                                            <div class="mt-2">
                                                <input type="text" id="phone" name="phone"
                                                    value="{{ old('phone') }}" maxlength="13" placeholder="08325443xxxx"
                                                    class="@error('phone') is-invalid @enderror form-control">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="email" class="">{{ __('Alamat Email') }}</label>

                                            <div class="mt-2">
                                                <input id="email" type="email" placeholder="john@example.com"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Password --}}
                                        <div class="mb-2">
                                            <label for="password" class="">{{ __('Kata sandi') }}</label>

                                            <div class="mt-2">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="password-confirm"
                                                class="">{{ __('Konfirmasi kata sandi') }}</label>
                                            <div class="mt-2">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="pt-1 my-3 text-center text-lg-start">
                                            <button class="btn btn-opung btn-lg btn-block fs-6 "
                                                type="submit">Daftar</button>
                                        </div>
                                    </form>

                                    <p class="">Sudah punya akun?
                                        <a href="{{ route('login') }}">Masuk disini</a>
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('images/opung/hero-register2.jpg') }}" alt="register form"
                                    class="h-100 img-fluid border-0 " style="border-radius: 0 1rem 1rem 0;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
