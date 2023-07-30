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
        <h3 class="card-title">Pemenang Lelang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>NIK</th>
            <th>Nama Penawar</th>
            <th>Nama Barang</th>
            <th>Periode Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($lelangs as $l)
            @if ($l->confirm_date != null)
            <tr>
              <td>{{ @$l->masyarakat->nik }}</td>
              <td>{{ @$l->masyarakat->name }}</td>
              <td>{{ $l->tgl_mulai }} - {{ $l->tgl_akhir }}</td>
              <td>{{ $l->barang->nama_barang }}</td>
              <td>Rp. {{ number_format($l->harga_awal) }}</td>
              <td>Rp. {{ number_format($l->harga_akhir) }}</td>
              <td>
                @if ($l->status == 'confirmed')
                    Pemenang
                @endif
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>NIK</th>
            <th>Nama Penawar</th>
            <th>Nama Barang</th>
            <th>Periode Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Status</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection