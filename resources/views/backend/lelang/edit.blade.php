@extends('backend.layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Data Lelang : {{ $lelang->barang->nama_barang }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <form action="{{ route('lelang.update', $lelang->id) }}" method="post">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" placeholder="Enter ..." name="tgl_mulai" value="{{ $lelang->tgl_mulai }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" class="form-control" placeholder="Enter ..." name="tgl_akhir" value="{{ $lelang->tgl_akhir }}">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button> |
          <a href="{{ route('lelang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection