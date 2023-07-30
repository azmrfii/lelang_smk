@extends('front.de')
@section('content')
<section class="ftco-section">
    @foreach ($lelangs as $lelang => $l)
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="3" class="image-popup"><img src="{{ asset('storage/' . $l->gambar) }} " class="img-fluid" alt="{{ $l->nama_barang }}"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $l->nama_barang }}</h3>
                <div class="rating d-flex">
                      
                    </div>
                <p class="price"><span>IDR {{ number_format($l->harga_awal) }}</span></p>
                <p>{{$l->deskripsi}}</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                  <div class="select-wrap">
                 
                </div>
                </div>
                        </div>
                        {{-- <div class="w-100">{{ $l->harga_penawaran }}</div> --}}
              <div class="w-100"></div>
              
          </div>
          <p><a class="btn btn-black py-3 px-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Add to Cart</a></p>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Lakukan Penawaran : {{ $l->nama_barang }}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('gotawar') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <label for="">Harga Penawaran</label>
                        <input type="hidden" name="id_lelang" id="id_lelang" value="{{ $l->id }}">
                        <input type="number" name="harga_penawaran" id="harga_penawaran" class="form-control" min="{{ $l->harga_awal }}" placeholder="Masukkan Harga Penawaran">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tawar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
    @endforeach
</section>
@endsection