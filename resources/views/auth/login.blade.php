@extends('layouts.app')
@php
    $title = 'Login';
@endphp

@section('content')
    <section class="vh-100 bg-opung">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('images/opung/hero-login2.jpg') }}" alt="login form"
                                    class="h-100 img-fluid border-0 " style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <h1 class="fw-normal pb-3 text-center text-md-start" style="letter-spacing: 1px;">
                                        Masuk
                                    </h1>

                                    <h6 class="text-opung mb-3">Hallo, selamat datang kembali warga opung :D</h6>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- Email --}}
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                required autocomplete="email" autofocus
                                                class="form-control form-control-lg @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Password --}}
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="password">Kata Sandi</label>
                                            <input type="password" id="password" name="password" required
                                                autocomplete="current-password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Ingat saya') }}
                                            </label>
                                        </div>

                                        <div class="pt-1 my-3">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-opung btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                    </form>

                                    <p class="mb-5 pb-lg-2">Belum punya akun?
                                        <a href="{{ route('register') }}">Daftar disini</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
