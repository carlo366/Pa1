@php
$categories = App\Models\Category::latest()->get();
// $product = App\Models\Product::latest()->get()
@endphp

@extends('users.layouts.templete')
@section('title','WijayaFarma | Category')
@section('css')
<link rel="stylesheet" href="{{asset('users/css/category.css')}}">
@endsection
@section('csss')
<style>
    .header {
        background-color: #3b3b3b;
    }
</style>
@endsection
@section('main-content')
<br><br><br>
<!--  Content -->
<div class="container">
    <section class="section reveal product">
        <div class="container">
            <br>
            <h2 class="h2 title_product">Kategori - {{$category->category_name}}</h2>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="container p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="dropdown ">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Kategori
                                        </button>
                                        <div class="dropdown-menu dropdown-scroll" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('product')}}">Semua</a>
                                            @foreach ($categories as $categori)
                                            <a class="dropdown-item" href="{{route('category', [$categori->id, $categori->slug]) }}">
                                                {{$categori->category_name}}
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="container-fluid">
                                <div class='searchbox float-end'>
                                    <form action=''>
                                        <input id="searchInput" class='serch' name='q'
                                            placeholder='Cari Disini...' title='Cari Tulisan di Sini'
                                            type='text' />
                                        <svg style="width:20px;margin-top:10px;" viewbox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                                        </svg>
                                        <span style='clear: both;display:block' />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if ($products->isEmpty())
                    <h1 class="text-center" style="margin: 2em 0em">Produk tidak tersedia</h1>
                    @else
                    @foreach ($products as $produc)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 cardColumn">
                            <div class="product-card" tabindex="0">
                                <figure class="card-banner">
                                    @if(json_decode($produc->product_img))
                                    @foreach(json_decode($produc->product_img) as $image)
                                    <img src="{{ asset($image) }}" width="312" height="350" loading="lazy"
                                        class="image-contain" alt="">
                                    @endforeach
                                    @else
                                    <img src="{{asset($produc->product_img)}}" width="312" height="350"
                                        loading="lazy" class="image-contain">
                                    @endif
                                    <ul class="card-action-list">
                                        <li class="card-action-item">
                                            @if (!Auth::check())
                                            <a href="{{route('login')}}">
                                                <button type="submit" class="card-action-btn" aria-labelledby="card-label-1">
                                                    <ion-icon name="cart-outline"></ion-icon>
                                                  </button>
                                                  <div class="card-action-tooltip" id="card-label-1">Beli Sekarang</div>
                                              </a>
                                              @elseif(auth()->user()->hasRole('customer'))
                                              @auth
                                            <form action="{{route('addproducttocart',$produc->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$produc->id}}" name="product_id">
                                                <input type="hidden" value="{{$produc->product_name}}"
                                                    name="product_name">
                                                <input type="hidden" value="{{$produc->product_img}}"
                                                    name="product_img">
                                                <input type="hidden" value="{{$produc->price}}" name="price">
                                                <input type="hidden" value="1" name="quantity">
                                                <button type="submit" class="card-action-btn"
                                                    aria-labelledby="card-label-1">
                                                    <ion-icon name="cart-outline"></ion-icon>
                                                </button>
                                                <div class="card-action-tooltip" id="card-label-1">Beli Sekarang
                                                </div>
                                            </form>
                                            @endauth
                                            @endif
                                        </li>
                                        <li class="card-action-item">
                                            <a href="{{route('singleproduct',[$produc->id,$produc->slug])}}">
                                                <button class="card-action-btn" aria-labelledby="card-label-3">
                                                    <ion-icon name="eye-outline"></ion-icon>
                                                </button>
                                                <div class="card-action-tooltip" id="card-label-3">Lihat Detail
                                                </div>
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
                                    <data class="card-price"
                                        value="180.85">{{ 'Rp '.number_format($produc->price, 0, ',', '.') }}</data>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchInput').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            var $cardColumns = $('.cardColumn');

            $cardColumns.each(function () {
                var cardText = $(this).text().toLowerCase();
                if (cardText.indexOf(value) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            if ($cardColumns.filter(':visible').length === 0) {
                $('.no-results').show(); // Show a message if no results found
            } else {
                $('.no-results').hide(); // Hide the message if there are results
            }
        });

        $('#categoryFilter').on('change', function () {
            var selectedCategory = $(this).val();
            var $cardColumns = $('.cardColumn');

            $cardColumns.each(function () {
                var cardCategory = $(this).data('category').toLowerCase();
                if (selectedCategory === 'all' || cardCategory === selectedCategory.toLowerCase()) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            if ($cardColumns.filter(':visible').length === 0) {
                $('.no-results').show(); // Show a message if no results found
            } else {
                $('.no-results').hide(); // Hide the message if there are results
            }
        });

        // Show "Belum ada Berita Terbaru" message if no news articles available
        if ($('.cardColumn').length === 0) {
            $('.no-results').show();
        }
    });
</script>

@endsection

