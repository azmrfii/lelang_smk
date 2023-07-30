@extends('backend.layouts.edit')
@section('content')

  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Input Gambar Data Barang : {{ $gambars->barang->nama_barang }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('postimage', $gambars->id) }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="nama_barang" value="{{ $gambars->barang->nama_barang }}" disabled>
              </div>
            </div>
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" id="" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button> |
                    <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

@endsection