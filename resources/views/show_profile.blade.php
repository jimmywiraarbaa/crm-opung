@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        <div class="text-center">
                            @if ($user->profile_picture)
                                <img class="rounded-circle" width="200" height="200"
                                    src="{{ asset('images/' . $user->profile_picture) }}" alt="Foto Profil">
                            @else
                                <p>Anda belum memiliki foto profil</p>
                            @endif
                        </div>


                        <form action="{{ route('edit_profile') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->email }}"
                                    disabled>
                            </div>

                            <div class="form-group mt-2">
                                <label for="phone">Nomor HP</label>
                                <input class="form-control" type="number" name="phone" id="phone"
                                    value="{{ $user->phone }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="password">Kata Sandi</label>
                                <input class="form-control" type="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>

                            <div class="form-group mt-2">
                                <label for="profile_picture">Foto Profil</label>
                                <input class="form-control" type="file" name="profile_picture">
                            </div>


                            <button class="btn btn-primary mt-3" type="submit">Ubah Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
