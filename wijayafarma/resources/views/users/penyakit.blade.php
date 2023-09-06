@php
    $all_penyakit = App\Models\deseases::latest()->get();
@endphp
@extends('users.layouts.templete')
@section('title','WijayaFarma | Penyakit')
@section('csss')
<link rel="stylesheet" href="{{asset('users/css/deases.css')}}">
<style>
    .header{
        background-color: #3b3b3b;
    }
</style>
@endsection
@section('main-content')
<div class="container">
    <!-- End Featured Services Section -->
    <section class="section reveal product">
        <div class="container">
            <br>
            <h2 class="h2 title_product">Jenis Penyakit</h2>

        </div>
        <div>

            <div class="parent">
                @foreach ($all_penyakit as $penyakit)
          <div class="card">
            <div class="img">
<img src="{{asset($penyakit->Penyakit_img)}}" style="width:100%" alt="">
            </div>
            <span>{{$penyakit->Nama_Penyakit}}</span>
            <p class="info">{{$penyakit->Deskripsi}}</p>
            {{-- <button>Resume</button> --}}
          </div>


          @endforeach



  </div>


</section>
          </div>
        </div>
@endsection
