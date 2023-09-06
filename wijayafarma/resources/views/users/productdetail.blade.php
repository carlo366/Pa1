@extends('users.layouts.templete')
@section('title','WijayaFarma | Product')
@section('css')
<link rel="stylesheet" href="{{asset('users/css/detailproduct.css')}}">
@endsection
@section('csss')
<style>
    .header {
        background-color: #3b3b3b;
    }
</style>
@endsection
@section('main-content')
<br><br>
<!-- Start slides -->
<div class="container">

    <!-- Single Products Detail -->
    <div class="small-container single-product">
      <div class="row">

          <div class="col-2">
              <a href="{{route('product')}}"><i class="bi bi-arrow-left">Back</i></a><br><br>

          <img src="{{asset($product->product_img)}}" width="100%" id="ProductImg" />
        </div>

        <div class="col-2">
            <h2>{{$product->product_name}}</h2>
            <h4>{{'Rp '.number_format($product->price, 0, ',', '.') }}</h4>
            <p>Categori - {{$product->product_category_name}}</p>
            <p>Tipe - {{$product->tipe}}</p>
            @if ($product->quantity === 0)
            <h4 class="text-danger"><b><u>Stok Habis</u></b></h4>
            @else
            <p>Stok - {{$product->quantity}}</p>
            @endif
            @if (!Auth::check())
            <a href="{{route('login')}}">
                <input type="submit" name="" id="" class="btn btn-success" style="border:none; width:8em;height:2.3em;" value="Add to Cart" style="width: 8em">
              </a>
              @elseif(auth()->user()->hasRole('customer'))
              @auth
            <form action="{{route('addproducttocart')}}" method="POST" >
                @csrf
            <input type="hidden" value="{{$product->id}}" name="product_id">
            <input type="hidden" value="{{$product->product_name}}" name="product_name">
            <input type="hidden" value="{{$product->product_img}}" name="product_img">
            <input type="hidden" value="{{$product->price}}" name="price">
            <label for="quantity">Berapa Banyak</label>
            <input class="form-control" type="number" min="1" value="1" name="quantity" style="border: 1px solid black;width:10em;">
            <input type="submit" name="" id="" class="btn btn-success" style="border:none; width:8em;height:2.3em;" value="Add to Cart" style="width: 8em">
            </form>
          <h3>Deskripsi Produk</h3>
          <br/>
          <p>
              <textarea name="" id="" cols="50" style="border:none; max-height:20em;" desabled>{{$product->product_deskripsi}}</textarea>
            </p>
         @endauth
         @endif


        </div>
        <h1>Ulasan</h1>
        <div style="max-height: 300px; overflow: auto;">
            @foreach ($comments as $index => $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $userNames[$index] }} :</h5>
                                <p class="comment-text">{{ $comment }}</p>
                                @if (isset($createdDates[$index]))
                                    <p class="comment-date text-muted">{{ $createdDates[$index]->diffForHumans() }}</p>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>







      </div>
    </div>


    </div>

<div class="container">
    <h2 class="h2 title_product">Produk Sejenis</h2>
    <div>
        <ul class="product-list">

            @foreach ($related_products->take(4) as $produc)
            @if ($produc->product_img !== $product->product_img)
        <li class="product-item">
          <div class="product-card" tabindex="0">

            <figure class="card-banner">
              <img src="{{asset($produc->product_img)}}" width="312" height="350" loading="lazy"  class="image-contain">

                      <ul class="card-action-list">
                        @if (!Auth::check())
                        <a href="{{route('login')}}">
                            <button type="submit" class="card-action-btn" aria-labelledby="card-label-1">
                                <ion-icon name="cart-outline"></ion-icon>
                              </button>
                              <div class="card-action-tooltip" id="card-label-1">Beli Sekarang</div>
                          </a>
                          @elseif(auth()->user()->hasRole('customer'))
                          @auth
                        <form action="{{route('addproducttocart')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$produc->id}}" name="product_id">
                                                <input type="hidden" value="{{$produc->product_name}}" name="product_name">
                                                <input type="hidden" value="{{$produc->product_img}}"
                                                    name="product_img">
                                                <input type="hidden" value="{{$produc->price}}" name="price">
                                                <input type="hidden" value="1" name="quantity">
                            <li class="card-action-item">
                                <button type="submit" class="card-action-btn" aria-labelledby="card-label-1">
                            <ion-icon name="cart-outline"></ion-icon>
                          </button>
                          <div class="card-action-tooltip" id="card-label-1">Beli Sekarang</div>
                        </li>
                    </form>
                    @endauth
                    @endif



                        <li class="card-action-item">
                          <a href="{{route('singleproduct',[$produc->id,$produc->slug])}}"><button class="card-action-btn" aria-labelledby="card-label-3">
                            <ion-icon name="eye-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-3">Lihat Detail</div>
                        </a>
                        </li>



                      </ul>
                    </figure>

                    <div class="card-content">

                      <div class="card-cat">
                        <a href="#" class="card-cat-link">{{$produc->product_category_name}}</a>
                      </div>

                      <h3 class="h3 card-title">
                        <a href="#">{{$produc->product_name}}</a>
                      </h3>

                      <data class="card-price">{{'Rp '.number_format($produc->price, 0, ',', '.')}}</data>

                    </div>

                  </div>
                </li>
                @endif
                @endforeach




                  </div>
                </li>
              </ul>

            </div>
        </div>
    <!-- JS for Toggle menu -->



@endsection
<script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>


