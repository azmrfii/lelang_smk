{{-- {{ $gambar->barang->nama_barang }} --}}
@extends('backend.layouts.edit')
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
        <h3 class="card-title">Data Barang | <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a></h3>
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
          {{-- <tbody>
            @foreach ($gambars as $g)
            @if ($g->urutan == 0)
            <tr>
              <td>{{ $g->barang->nama_barang }}</td>
              <td>{{ $g->barang->deskripsi }}</td>
              <td>IDR {{ number_format($g->barang->harga_awal) }}</td>
              <td><img src="{{ asset('storage/' . $g->gambar) }}" alt="" width="100px" height="100px"></td>
              <td>{{ $g->barang->status }}</td>
              <td>
                @if ($g->barang->status == 'new')
                <form action="{{ route('barang.destroy', $g->id) }}" method="POST">
                    @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $g->nama_gambar }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                @else
                <a href="">This barang is delivery</a>                  
                @endif
                </td>
            </tr>
            @endif
            @endforeach
          </tbody> --}}
          <tbody>
            @foreach ($barangs as $b)
            <tr>
              <td>{{ $b->nama_barang }}</td>
              <td>{{ $b->deskripsi }}</td>
              <td>IDR {{ number_format($b->harga_awal) }}</td>
              <td><img src="{{ asset('storage/' . $b->gambar) }}" alt="" width="100px"></td>
              <td>{{ $b->status }}</td>
              <td>
                <form action="{{ route('gambar.delete', $b->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $b->nama_gambar }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
              </td>
            </tr>
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
@endsection