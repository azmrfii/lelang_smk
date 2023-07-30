@extends('backend.layouts.sidebar')
@section('content')
<div class="col-12">
    @if (Session::get('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Barang | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Harga Awal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($gambars as $g)
            {{-- @if ($g->urutan == 0) --}}
            <tr>
              <td>{{ $g->barang->nama_barang }}</td>
              <td>{{ $g->barang->deskripsi }}</td>
              <td>IDR {{ number_format($g->barang->harga_awal) }}</td>
              <td><img src="{{ asset('storage/' . $g->gambar) }}" alt="" width="100px" height="100px"></td>
              <td>{{ $g->barang->status }}</td>
              <td>
                @if ($g->barang->status == 'new')
                <form action="{{ route('barang.destroy', $g->id) }}" method="POST">
                  {{-- <a data-bs-toggle="modal" data-bs-target="#image {{ $g->id }}" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a> --}}
                  <a href="{{ route('barang.image', $g->id) }}" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a>
                  <a href="{{ route('barang.show', $g->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  <a href="{{ route('barang.edit', $g->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $g->nama_gambar }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                @else
                <a href="">This barang is delivery</a>                  
                @endif
                </td>
            </tr>
            {{-- @endif --}}
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Harga Awal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Barang :</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_barang" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Deskripsi :</label>
                    <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" maxlength="100" required></textarea>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Harga Awal :</label>
                    <input type="number" class="form-control" id="recipient-name" name="harga_awal" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Gambar :</label>
                    <input type="file" class="form-control" id="recipient-name" name="gambar" required>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- <div class="modal fade" id="image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Image Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('postimage', $gambars->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">New Gambar :</label>
                    <input type="file" class="form-control" id="recipient-name" name="gambar">
                  </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div> --}}
@endsection