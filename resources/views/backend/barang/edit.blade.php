@extends('backend.layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Data Barang : {{ $gambars->nama_barang }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('barang.update', $gambars->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="nama_barang" value="{{ $gambars->barang->nama_barang }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Harga Awal</label>
              <input type="number" class="form-control" placeholder="Enter ..." name="harga_awal" value="{{ $gambars->barang->harga_awal }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- textarea -->
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi" required>{{ $gambars->barang->deskripsi }}</textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <img src="{{ asset('storage/' . $gambars->gambar) }}" alt="" width="400px" height="250px">
            <div class="form-group">
              <label>Gambar</label>
              <input type="hidden" name="oldImage" value="{{ $gambars->gambar }}">
              <input type="file" name="gambar" id="" class="form-control" required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button> |
        <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection