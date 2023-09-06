@extends('users.layouts.userprofile')


@section('profilecontent')
<br>
    <h3>Pemesanan</h3>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <div class="table-responsive">

    <table class="table">
        <tr>
            <th>Id Order</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>status</th>
            <th>Tanggal Pemesanan</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($pending_orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>@foreach (json_decode($order->product_nama) as $item)
                    <p>{{$item}}</p>
                @endforeach</td>
                <td>@foreach (json_decode($order->quantity) as $item)
                    <p>{{$item}}</p>
                @endforeach</td>
                <td>{{$order->status}}</td>
                <td>{{ \Carbon\Carbon::parse($order->date)->format('d M Y')}}</td>
                <td><a href="{{route('peddingordersdetil',$order->id)}}" class="btn btn-info">Detail</button></td>
                <td><a href="{{route('orderdelete',$order->id)}}" class="btn btn-danger">batal</a></td>
            </tr>
        @endforeach
    </table>
    </div>
    <div class="col-md-8">
        <section class="container col">
          <section class="row">
            <div class="col">
              <h1 class="text-left" id="Profile">METODE PEMBAYARAN</h1>
              <p class="teks">Silahkan pilih metode yang Anda inginkan</p>
              <div class="col-md-10 shadow my-5 py-2">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-black dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          QRIS Mandiri
                        </button>
                      </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="text-center">
                          <img src="{{ asset('img/qris.jpg')}}" class="img-fluid" alt="QRIS Mandiri">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </section>
      </div>



@endsection
