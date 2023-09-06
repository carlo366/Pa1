@extends('users.layouts.templete')
@section('title','WijayaFarma | Profile')
@section('csss')
<style>
    .header {
        background-color: #3b3b3b;
    }
</style>
@endsection
@section('css')
<style>

    .user-profile {
  display: flex;
  align-items: center;
  font-family: sans-serif;
  color: #333;
  padding: 1rem;
  border-radius: 10px;
}

.profile-image {
  width: 100px;
  height: 100px;
  margin-right: 1rem;
  overflow: hidden;
  border-radius: 50%;
  border: 5px solid #fff;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

.profile-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.profile-info {
  flex-grow: 1;
}

.profile-name {
  margin: 0;
  font-size: 1.5rem;
}

.profile-details {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.profile-details p {
  margin: 0;
  margin-right: 1.5rem;
  font-size: 0.8rem;
  display: flex;
  align-items: center;
}

.profile-details p i {
  margin-right: 0.5rem;
  font-size: 1.2rem;
}

.profile-details p:last-of-type {
  margin-right: 0;
}
.profile-body{
    background-color: #f5f5f5;
}
    </style>
@endsection
@section('main-content')
<br><br><br><br><br>
    <div class="">
        <div class="p-5">
            <div class="text-center">
                @if (session()->has('message'))
                <div id="alert" class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif (session()->has('error'))
                <div id="alert" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
                <h1>Edit Profile</h1>

                {{-- <div class="container"> --}}
                    <div class="row">
                        <div class="col">
                            @if (empty(Auth::user()->user_img))
                            <a href="{{route('editprofil')}}"><img src="{{asset('users/img/profile.png')}}" alt="Foto Profil"></a>
                            @else
                            <img src="{{asset(Auth::user()->user_img)}}" style="width: 300px" alt="Foto Profil">
                            @endif
                        </div>
                        <div class="col">
                                <form action="{{route('updategambar')}}" method="POST" enctype="multipart/form-data" style="width: 38em; max-width:100%;">
                                    @csrf
                                    <label for="formFile" class="form-label">Masukkan Foto Baru</label>
                                    <input class="form-control" type="file" id="formFile" name="user_img">
                                    <input type="submit" class="btn btn-success mt-5" value="Update Gambar">
                                </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container">

            <div class="col-lg-20">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-5">
                            <h1 class="text-center">User Info</h1>
                            <form action="{{ route('editprofile') }}" method="POST">
                                @csrf
                            <div class="col-sm-2">
                                <h6 class="mb-0">User Name</h6>
                            </div>
                            <div class="col-sm-12 text-secondary">
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-sm-2">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" >
                        </div>
                    </div>

                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-sm-12 text-secondary">

                                <input type="date" class="form-control" value="{{Auth::user()->birthdate}}" name="birth" required >
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Nomor Telepon</h6>
                            </div>
                            <div class="col-sm-12 text-secondary">
                                @if (empty(Auth::user()->birthdate))
                                <input type="text" class="form-control" value="" name="phone" required>
                                @else
                                <input type="text" class="form-control" value="{{Auth::user()->phone}}"  name="phone" required>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-12 text-secondary">
                                <textarea class="form-control" cols="33" name="address" required >{{Auth::user()->address}}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-12 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Submit">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Ubah Password
                                </h2>
                <p class="mt-1 text-sm text-gray-600 text-danger">
                    Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman
                </p>
            </header>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="current_password" class="block font-medium text-lg text-gray-900 dark:text-gray-100">
                        Password Lama
                    </label>
                    <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                    @if($errors->updatePassword->has('current_password'))
                        <span class="text-sm text-danger">
                            {{ $errors->updatePassword->first('current_password') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="block font-medium text-lg text-gray-900 dark:text-gray-100">
                        Password Baru
                    </label>
                    <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                    @if($errors->updatePassword->has('password'))
                        <span class="text-sm text-danger">
                            {{ $errors->updatePassword->first('password') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="block font-medium text-lg text-gray-900 dark:text-gray-100">
                        Konfirmasi Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                    @if ($errors->updatePassword->has('password_confirmation'))
                        <span class="text-sm text-danger">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </span>
                    @endif
                </div>

                <br><br>
                <div class="flex items-center gap-4">
                    <button class="btn btn-success">
                        Save
                    </button>

                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-gray-600 dark:text-gray-400" id="status-message">
                            {{ __('Saved.') }}
                        </p>
                        <script>
                            setTimeout(function() {
                                document.getElementById('status-message').remove();
                            }, 2000);
                        </script>
                    @endif
                </div>
            </form>

        </section>

    </div>
    </div>


    @endsection
