
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title','name-title')</title>

  <link rel="icon" type="image/x-icon"
  href="{{ asset('admindasboard/assets/img/favicon/Kuy_Apotek-transformed.png') }}" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  @yield('css')

  <!-- Vendor CSS Files -->
  <link href="{{asset('users/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('users/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/floating-wpp.css')}}">
  <script src="{{asset('users/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('users/css/navbar.css')}}">
  <link href="{{asset('css/floating-wpp.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/floating-wpp.min.css')}}">
  @yield('csss')
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container-fluidd d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">wijayafarma@gmail.com</a>
        <i class="bi bi-phone"></i>+62 823-7077-1069
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://www.facebook.com/profile.php?id=100009095737620&mibextid=ZbWKwL" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/yesika_pradinatasitohang?igshid=ZGUzMzM3NWJiOQ==" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://api.whatsapp.com/send/?phone=%2B6282370771069&text&type=phone_number&app_absent=0" target="_blank" class="twitter"><i class="bi bi-whatsapp"></i></a>
      </div>
    </div>
  </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><img src="{{asset('users/img/20230327_153201.png')}}" alt=""></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('product')}}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{route('penyakit')}}">Penyakit</a></li>
          {{-- {{-- <li><a class="nav-link scrollto" href="{{route('todaydeal')}}">Today's deal</a></li> --}}
          <li><a class="nav-link scrollto" href="{{route('about')}}">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#doctors"></a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      @auth
      @if(auth()->user()->hasRole('customer'))
            <div class="d-flex p-1 me-3 nav-cart" style=""><a href="{{route('addtocart')}}" class="cart"><i class="bi bi-cart">&nbsp;Keranjang</i></a></div>
      <!-- .navbar -->
      @if (empty(Auth::user()->user_img))
      <img src="{{asset('users/img/profile.png')}}"  width="35px" height="35px" class="profil" onclick="toggleMenu()" alt="">
        @else
        <img src="{{asset(Auth::user()->user_img)}}"  width="35px" height="35px" class="profil" onclick="toggleMenu()" alt="">
      @endif
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
                        <div class="user-info">
                            @if (empty(Auth::user()->user_img))
                            <img src="{{asset('users/img/profile.png')}}" style="width: 50px; height:50px;" alt="">
                              @else
                              <img src="{{asset(Auth::user()->user_img)}}" style="width: 50px; height:50px;" alt="">
                            @endif
                            <br>
                            <h2>{{Auth::user()->name}}</h2>
                        </div><hr>
                        <a href="{{route('userprofile')}}" class="sub-menu-link">
                            <img src="{{asset('users/img/profile.png')}}" alt="">
                            <p class="ms-4">Profil</p>
                          <span>></span>
                        </a>
                    <a href="{{route('editprofil')}}" class="sub-menu-link">
                        <img src="{{asset('users/img/setting.png')}}" alt="">
                        <p class="ms-4">edit Profil</p>
                        <span>></span>
                    </a>

                      <form method="POST" action="{{ route('logout') }}" class="sub-menu-link">
                            @csrf
                            <img src="{{asset('users/img/logout.png')}}" alt="">
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>

                        </form>
                    </div>
                  </div>
                  @elseif (auth()->user()->hasRole('admin'))
                  <a href="{{route('admindasboard')}}" class="btn btn-success">Halaman admin</a>
                  @endif
                  @endauth
                  @guest
                  <a href="{{route('login')}}" class="p-2 pe-4 ps-4" style="border:1px solid white;border-radius:50%;color:white;">login</a>
                  @endguest
    </div>
  </header>
  <!-- End Header -->
@yield('main-content')


    <!--
      - #FOOTER
    -->

    <footer class="footer">

        <div class="footer-top  reveal section">
          <div class="container">

            <div class="footer-brand">

              <a href="#" class="logo">

              </a>

              <ul class="social-list">

                <li>
                  <a href="https://www.facebook.com/profile.php?id=100009095737620&mibextid=ZbWKwL" target="_blank" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="https://instagram.com/yesika_pradinatasitohang?igshid=ZGUzMzM3NWJiOQ==" target="_blank" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="https://api.whatsapp.com/send/?phone=%2B6282370771069&text&type=phone_number&app_absent=0" target="_blank" class="social-link">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                  </a>
                </li>

              </ul>

            </div>

            <div class="footer-link-box">

              <ul class="footer-list">

                <li>
                  <p class="footer-list-title">Hubungi Kami</p>
                </li>

                <li>
                  <address class="footer-link">
                    <ion-icon name="location"></ion-icon>

                    <span class="footer-link-text">
                      Jl. Balige No.12, Sigumpar Dangsina, Kec. Sigumpar, Toba, Sumatera Utara 22384
                    </span>
                  </address>
                </li>

                <li>
                  <a href="tel:+557343673257" class="footer-link">
                    <ion-icon name="call"></ion-icon>

                    <span class="footer-link-text">+62 823-7077-1069</span>
                  </a>
                </li>

                <li>
                  <a href="mailto:wijayafarma@gmail.com" class="footer-link">
                    <ion-icon name="mail"></ion-icon>

                    <span class="footer-link-text">wijayafarma@gmail.com</span>
                  </a>
                </li>

              </ul>

              <ul class="footer-list">

                <li>
                  <p class="footer-list-title">Akun Kami</p>
                </li>

                <li>
                  <a href="{{route('userprofile')}}" class="footer-link">
                    <ion-icon name="chevron-forward-outline"></ion-icon>

                    <span class="footer-link-text">Akun</span>
                  </a>
                </li>

                <li>
                  <a href="{{route('addtocart')}}" class="footer-link">
                    <ion-icon name="chevron-forward-outline"></ion-icon>

                    <span class="footer-link-text">Tampilan Keranjang</span>
                  </a>
                </li>

              </ul>

              <div class="footer-list">

                <p class="footer-list-title">Jam Buka Toko</p>

                <table class="footer-table">
                  <tbody>

                    <tr class="table-row">
                      <th class="table-head" scope="row">Senin-Selasa :</th>

                      <td class="table-data">8AM - 10PM</td>
                    </tr>

                    <tr class="table-row">
                      <th class="table-head" scope="row">Rabu :</th>

                      <td class="table-data">8AM - 7PM</td>
                    </tr>

                    <tr class="table-row">
                        <th class="table-head" scope="row">Kamis :</th>

                        <td class="table-data">7AM - 12PM</td>
                      </tr>

                    <tr class="table-row">
                      <th class="table-head" scope="row">Jumat :</th>

                      <td class="table-data">7AM - 12PM</td>
                    </tr>

                    <tr class="table-row">
                      <th class="table-head" scope="row">Sabtu :</th>

                      <td class="table-data">9AM - 8PM</td>
                    </tr>

                    <tr class="table-row">
                      <th class="table-head" scope="row">Minggu :</th>

                      <td class="table-data">Tutup</td>
                    </tr>

                  </tbody>
                </table>

              </div>

              <div class="footer-list">

                <p class="footer-list-title">Info</p>

                <p class="newsletter-text">
                    Resmi beroperasi sejak Mei 2023 dan akan beroperasi 24 jam setiap hari.
                </p>


              </div>

            </div>

          </div>
        </div>

        <div class="footer-bottom">
          <div class="container">

            <p class="copyright">
              &copy; 2023 <a href="#" class="copyright-link">wijayafarma</a>.
            </p>

          </div>
        </div>

      </footer>
      <div id="myButton"></div>

  <script src="{{asset('users/js/navbar.js')}}"></script>
  <script src="{{asset('users/js/profil.js')}}"></script>
<script src="{{asset('users/js/scroll.js')}}"></script>
<script src="{{asset('users/js/jquery.min.js')}}"></script>
<script src=""></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 <script src="{{asset('users/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('users/js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('users/js/custom.js')}}"></script>
    <script src="{{asset('users/js/bootstrap.bundle.min.js')}}"></script>

   <link rel="stylesheet" href="{{asset('users/js/jquery.min.js')}}">
   <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
 </script>
 <script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 5000);
</script>
<!-- Buat script wa -->
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="{{asset('css/floating-wpp.min.js')}}"></script>
<script src="{{asset('css/floating-wpp.js')}}"></script>
<script src="{{asset('users/js/whatsap.js')}}"></script>
  @stack('js')
</body>

</html>
