@extends('users.layouts.userprofile')
@section('title','WijayaFarma | Profile')
@section('profilecontent')
<head>
<style>
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
    </style>
</head>
<body>
    <br>
    @if (session()->has('message'))
<div id="alert" class="alert alert-success">
    {{ session()->get('message') }}
</div>
@elseif (session()->has('error'))
<div id="alert" class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<div class="col-lg-20">
    <div class="card">
        <div class="card-body">

            <div class="row mb-5">
                    <div class="col-sm-3">
                        <h6 class="mb-0">User Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <form action="{{ route('updateprofile') }}" method="POST">
                @csrf
            <div class="row mb-5">
                <div class="col-sm-3">
                    <h6 class="mb-0">Tanggal Lahir</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    @if (empty(Auth::user()->birthdate))
                    <input type="date" class="form-control" value="" name="birth" required>
                    @else
                    <input type="date" class="form-control" value="{{Auth::user()->birthdate}}" name="birth" required readonly>
@endif
                </div>
            </div>
                <div class="row mb-5">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nomor Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (empty(Auth::user()->birthdate))
                        <input type="text" class="form-control" value="" name="phone" required>
                        @else
                        <input type="text" class="form-control" value="{{Auth::user()->phone}}" readonly name="phone" required>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (empty(Auth::user()->address))
                        <textarea class="form-control" cols="33" name="address" required></textarea>
                        @else
                        <textarea class="form-control" cols="33" name="address" required readonly>{{Auth::user()->address}}</textarea>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        @if (empty(Auth::user()->birthdate & Auth::user()->address & Auth::user()->phone))
<input type="submit" class="btn btn-primary px-4" value="Save">
@else

                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
@endsection
