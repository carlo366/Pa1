@php
    $all_penyakit = App\Models\deseases::latest()->get();
@endphp
@extends('users.layouts.templete')
@section('title','WijayaFarma | Home')
@section('main-content')
<link rel="stylesheet" href="{{asset('users/css/home.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<!-- Start slides -->

<div id="slides" class="cover-slides">
    <ul class="slides-container">
      <li class="text-left">
        <img src="{{asset('img/IMG_20230504_153632.jpg')}}" alt="">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="m-b-20"><strong>WijayaFarma</strong></h1>
              <p class="m-b-40">Tersedia berbagai jenis produk obat-obatan dan peralatan medis yang telah tersedia pada retail dan juga terdapat berbagai macam informasi penyakit yang dapat diakses oleh kamu dimanapun dan kapanpun kamu berada.</p>
              <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route('about')}}">Tentang</a></p>
            </div>
          </div>
        </div>
      </li>
      <li class="text-left">
        <img src="{{asset('img/IMG_20230504_153725.jpg')}}" alt="">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="m-b-20"><strong>WijayaFarma</strong></h1>
              <p class="m-b-40">Tersedia berbagai jenis produk obat-obatan dan peralatan medis yang telah tersedia pada retail dan juga terdapat berbagai macam informasi penyakit yang dapat diakses oleh kamu dimanapun dan kapanpun kamu berada.</p>
              <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route('about')}}">Tentang</a></p>
            </div>
          </div>
        </div>
      </li>
      <li class="text-left">
        <img src="{{asset('img/IMG_20230504_152915.jpg')}}" alt="">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="m-b-20"><strong>WijayaFarma</strong></h1>
              <p class="m-b-40">Tersedia berbagai jenis produk obat-obatan dan peralatan medis yang telah tersedia pada retail dan juga terdapat berbagai macam informasi penyakit yang dapat diakses oleh kamu dimanapun dan kapanpun kamu berada.</p>
              <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route('about')}}">Tentang</a></p>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <div class="slides-navigation">
      <a href="#" class="next"><i class="bi bi-arrow-right-circle" aria-hidden="true"></i></a>
      <a href="#" class="prev"><i class="bi bi-arrow-left-circle" aria-hidden="true"></i></a>
    </div>
</div>
  <!-- End slides -->
  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container reveal kekiri" data-aos="fade-up">
          <hr><br>
          <div class="row">

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><img src="{{asset('users/img/24-hours.png')}}  "></div>
                <h4 class="title"><a href="">24 Jam</a></h4>
                <p class="description">Toko online wijayafarma dapat diakses selama 24 jam dimanapun dan kapanpun anda berada.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><img src="{{asset('users/img/add-to-cart.png')}}"> </div>
                <h4 class="title"><a href="">Toko Online</a></h4>
                <p class="description">Pada toko online wijayafarma anda dapat berbelanja obat dan keperluan medis lainnya dengan mudah.</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><img src="{{asset('users/img/customer-service.png')}}"> </i></div>
                <h4 class="title"><a href="">Live Chat</a></h4>
                <p class="description">Toko online wijayafarma menyediakan forum untuk pelanggan yang ingin mengajukan pertanyaan seputar masalah kesehatan anda.</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Featured Services Section -->
      <section class="section reveal product">
        <div class="container">
          <hr><br>
          <h2 class="h2 title_product">Produk</h2>

          <div class="row">
            @foreach ($allproduct->take(8) as $produc)
            <div class="col-md-6 col-lg-3">
              <div class="product-card" tabindex="0">
                <figure class="card-banner">
                  <img src="{{asset($produc->product_img)}}" width="312" height="350" loading="lazy" class="image-contain">


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

                        <button type="submit" class="card-action-btn" aria-labelledby="card-label-1">
                            <ion-icon name="cart-outline"></ion-icon>
                        </button>
                        <div class="card-action-tooltip" id="card-label-1">Beli Sekarang</div>
                    </form>
                    @endauth
                    </li>
                    @endif

                    <li class="card-action-item">
                        <a href="{{route('singleproduct',$produc->id)}}">
                            <button class="card-action-btn" aria-labelledby="card-label-3">
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
                  <data class="card-price" value="{{ $produc->price }}">{{ 'Rp '.number_format($produc->price, 0, ',', '.') }}</data>
                </div>
              </div>
              <br><br>
            </div>
            @endforeach
          </div>
        </div>
        <br><br><br><br>
        <div class="wrapper"><br><br>
          <h2 class="h2 title_product2 text-center">Penyakit</h2>
          <br><br>
          <div class="carousel">
            @foreach ($all_penyakit as $penyakit)
            <div class="card">
              <div class="img"><img src="{{asset($penyakit->Penyakit_img)}}" style="width:100%" alt="img" draggable="false"></div>
              <h2>{{$penyakit->Nama_Penyakit}}</h2>
              <span>{{$penyakit->Deskripsi}}</span>
            </div>
            @endforeach
          </div>
          <br><br><br>
        </div>
      </section>

          @endsection

      <script>
        const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");
const carouselChildrens = [...carousel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2000);
}
autoPlay();

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);
      </script>



