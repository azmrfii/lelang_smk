@extends('front.style')
@section('content')
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
	  @foreach ($lelangs as $lelang => $l)	
	  <div class="slider-item" style="background-image: url({{ asset('storage/' . $l->gambar) }});">
		  <div class="overlay"></div>
		<div class="container">
		  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

			<div class="col-md-12 ftco-animate text-center">
			  <h1 class="mb-2">{{ $l->nama_barang }}</h1>
			  <h2 class="subheading mb-4">{{ $l->deskripsi }}</h2>
			  <p><a href="#" class="btn btn-primary">View Details</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  @endforeach
  </div>
</section>

<section class="ftco-section">
  <div class="container">
		  <div class="row justify-content-center mb-3 pb-3">
	<div class="col-md-12 heading-section text-center ftco-animate">
		<span class="subheading">Featured Lelangs</span>
	  <h2 class="mb-4">All Lelangs</h2>
	  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus a repudiandae eaque animi exercitationem illo.</p>
  </div>
  </div>   		
  </div>
  <div class="container">
	  <div class="row">
		  @foreach ($lelangs as $lelang => $l)
		  <div class="col-md-6 col-lg-3 ftco-animate">
			  <div class="product">
				  <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/' . $l->gambar) }}" alt="{{ $l->nama_barang }}">
					  <span class="status">30%</span>
					  <div class="overlay"></div>
				  </a>
				  <div class="text py-3 pb-4 px-3 text-center">
					  <h3><a href="#">{{ $l->nama_barang }}</a></h3>
					  <div class="d-flex">
						  <div class="pricing">
							  <p class="price"><span class="price-sale">IDR {{ number_format($l->harga_awal) }}</span></p>
						  </div>
					  </div>
					  <div class="bottom-area d-flex px-3">
						  <div class="m-auto d-flex">
							{{-- <a href="{{ route('barang.penawaran', $l->id) }}"></a> --}}
							  <a href="{{ route('barang.penawaran', $l->id) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
								  <span><i class="ion-ios-cart"></i></span>
							  </a>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		  @endforeach
	  </div>
  </div>
</section>


@endsection