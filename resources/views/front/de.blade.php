<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lelang Zamfa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/animate.css">
    
    <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/front/css/magnific-popup.css">

    <link rel="stylesheet" href="/front/css/aos.css">

    <link rel="stylesheet" href="/front/css/ionicons.min.css">

    <link rel="stylesheet" href="/front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/front/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/front/css/flaticon.css">
    <link rel="stylesheet" href="/front/css/icomoon.css">
    <link rel="stylesheet" href="/front/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            @auth
						    <span class="text">Login Sebagai : {{ Auth::user()->username }}</span>
                            @endauth
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Lelang Zamfa</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            @guest
            @if (Route::has('login'))
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>  
            @endif
          @else
          {{-- <button type="submit" name="add-to-cart" value=""  data-bs-toggle="modal" data-bs-target="#exampleModal" class="button">Login Sebagai : {{ auth()->user()->username }}</button> --}}
            <li class="nav-item">
              <a class="nav-link">Hi, {{ auth()->user()->username }}</a>
            </li>
            @auth              
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Riwayat</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item {{ Request::is('riwayatpenawaran') ? 'active' : '' }}" href="{{ route('detailriwayat') }}">Riwayat Penawaran</a>
                    <a class="dropdown-item {{ Request::is('pemenang') ? 'active' : '' }}" href="{{ route('riwayatpemenang') }}">Pemenang Lelang</a>
                </div>
            </li>
            @endauth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
              <i class="icon icon-user"></i>
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </li>  
            <form action="{{ route('search.barang') }}" role="search" method="get" class="search-box">
              <input class="search-field text search-input" placeholder="Search" name="search" value="{{ old('search') }}" type="search">
              {{-- <input type="submit" value="Search"> --}}
            </form>
          @endguest
            
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	  @yield('content')
    {{-- @guest --}}

    {{-- @endguest --}}
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Lelang Zamfa</h2>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias distinctio nobis autem dolores!</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/azmrfii/" target="_blank"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="https:/www.whatsapp.me/081384197696/" target="_blank"><span class="icon-whatsapp"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Farmako street cimande hilir</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 812 2329 2101</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">lelangzamfa01@yahoo.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | By <a href="#">Lz</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  <script src="/front/js/jquery.min.js"></script>
  <script src="/front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/front/js/popper.min.js"></script>
  <script src="/front/js/bootstrap.min.js"></script>
  <script src="/front/js/jquery.easing.1.3.js"></script>
  <script src="/front/js/jquery.waypoints.min.js"></script>
  <script src="/front/js/jquery.stellar.min.js"></script>
  <script src="/front/js/owl.carousel.min.js"></script>
  <script src="/front/js/jquery.magnific-popup.min.js"></script>
  <script src="/front/js/aos.js"></script>
  <script src="/front/js/jquery.animateNumber.min.js"></script>
  <script src="/front/js/bootstrap-datepicker.js"></script>
  <script src="/front/js/scrollax.min.js"></script>
  <script src="/front/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/front/js/google-map.js"></script>
  <script src="/front/js/main.js"></script>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>