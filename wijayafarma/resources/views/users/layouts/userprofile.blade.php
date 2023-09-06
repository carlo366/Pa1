    @extends('users.layouts.templete')
@section('title','WijayaFarma | Profile')
@section('csss')
<style>

    .header{
        background-color: black;
        opacity: 0.8s;
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
<div class="profile-body">

    <div class="user-profile container">
        <div class="profile-image">
            @if (empty(Auth::user()->user_img))
            <img src="{{asset('users/img/profile.png')}}" alt="Foto Profil">
              @else
           <img src="{{asset(Auth::user()->user_img)}}" alt="Foto Profil">
            @endif
        </div>
        <div class="profile-info">
          <h2 class="profile-name">{{Auth::user()->name}}</h2>
          <div class="profile-details">
            <p class="profile-email"><i class="far fa-envelope"></i>{{Auth::user()->email}}</p>
            <p class="profile-birthday"><i class="fas fa-birthday-cake"></i>{{Auth::user()->birthdate}}</p>
           <a href="{{route('editprofil')}}" class="ps-4" style="color: black"><p><i class="bi bi-gear"></i>Edit Profile</p></a>
        </div>
        </div>
    </div>
</div>

    <div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box-main">
                <br>
                <ul>
                    <li><a href="{{route('userprofile')}}">Profil Saya</a></li>
                    <li><a href="{{route('peddingorders')}}">Pesanan Saya</a></li>
                    <li><a href="{{route('history')}}">Riwayat</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box-main">
               @yield('profilecontent')
            </div>
        </div>
    </div>
</div>
@endsection
