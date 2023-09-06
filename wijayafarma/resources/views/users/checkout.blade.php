@extends('users.layouts.templete')
@section('title','WijayaFarma | Check out')
@section('csss')
<style>
    input{
        border-bottom:1px solid black;
        padding:0.5em;
        margin: 0.4em;
        max-width: 100%;
    }
    input:focus {
        outline: none;
    }
    .header{
    background-color:black;
    opacity: 0.8;
}

</style>
@endsection
@section('main-content')
<br><br><br><br><br><br>
@if (session()->has('message'))
<div id="alert" class="alert alert-success">
    {{ session()->get('message') }}
</div>
@elseif (session()->has('error'))
<div id="alert" class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<div class="container">
    <center>
        <h2 style="text-center">Pesanan Kamu</h2>
    </center>
<hr>
<div class="row">
    <div class="col-12 col-md-7">
        <div class="box-main">
            <h3>Masukkan lokasi</h3>
            <form action="{{route('placeorder')}}" method="POST">
                @csrf
                <input type="text" placeholder="nama" class="form-control" name="nama" required>
                <input type="text" placeholder="nama kota" class="form-control" name="shipping_city" required>
                <input type="text" placeholder="Kode Pos" class="form-control" name="shipping_postalcode" required>
                <input type="text" placeholder="Alamat" class="form-control" name="address" required>
                <input type="text" placeholder="Nomor Telepon" class="form-control" name="shipping_phonenumber" required>
        </div>
    </div>

    <div class="col-12 col-md-5 mt-5">
        <div class="box-main">
            <h3>Orderan Kamu</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>@total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                       @foreach ($cart_items as $item)
                       @php
                           $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                       @endphp
                       <tr>
                           <td>
                               <!-- Tambahkan checkbox dengan atribut checked jika produk terpilih -->
                               <input type="checkbox" name="ids[]" style="display:none;" value="{{ $item->id }}" {{ in_array($item->id, $checkedItems) ? 'checked' : '' }}>
                               {{ $product_name }}
                           </td>
                           <td>{{ $item->quantity }}</td>
                           <td>{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</td>
                           @php
                               $count = $item->quantity * $item->price;
                           @endphp
                           <td>{{ 'Rp '.number_format($count) }}</td>
                       </tr>
                       @php
                           $total = $total + $count;
                       @endphp
                   @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Harga</td>
                            <td>{{ 'Rp '.number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 d-flex align-items-center">
        <a href="{{route('addtocart')}}" class="btn btn-danger" style="height: 3em; width: 100%;">Batalkan</a>
    </div>
    <div class="col-md-6 d-flex align-items-center">
        <input type="submit" value="Beli" class="btn btn-primary ms-md-4" style="width: 100%;">
    </div>
</div>


</form>
</div>

<div class="col-12 col-md-8 container">
    <section class="container col">
        <section class="row">
            <div class="col">
                <hr>
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

</div>
@endsection
