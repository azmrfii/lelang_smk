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
        <h3 class="card-title">Data Lelang |  <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
        {{-- <h3 class="card-title">Data Lelang |  <a href="{{ route('lelangtambah') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3> --}}
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Akhir</th>
            <th>Penanggung Jawab</th>
            <th>Penawar Terakhir</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($lelangs as $l)
            <tr>
              <td>{{ $l->tgl_mulai }}</td> 
              <td>{{ $l->tgl_akhir }}</td>
              <td>{{ $l->barang->nama_barang}}</td>
              <td>Rp. {{ number_format($l->harga_awal) }}</td>
              <td>Rp. {{ number_format($l->harga_akhir) }}</td>
              {{-- <td>{{ $l->harga_akhir }}</td> --}}
              <td>{{ $l->user->username }}</td>
              <td>{{ @$l->masyarakat->username }}</td>
              <td>{{ $l->status }}</td>
              <td>
                @if ($l->status == 'open')
                <a href="{{ route('lelang.edit', $l->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                <a href="/cancel/{{ $l->id }}" class="btn btn-info" onclick="return confirm('Are You sure to cancel {{ $l->barang->nama_barang }} ?');"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="/closed/{{ $l->id }}" class="btn btn-danger" onclick="return confirm('Are You sure to closed {{ $l->barang->nama_barang }} ?');"><i class="fa fa-ban" aria-hidden="true"></i></a>
                @elseif($l->status == 'cancel')
                <a href="/open/{{ $l->id }}" class="btn btn-info" onclick="return confirm('Are You sure to open {{ $l->barang->nama_barang }} ?');"><i class="fa fa-undo" aria-hidden="true"></i></a><a href="">Open Lelang Again</a>
                @else
                <a href="#" class="btn btn-danger">Lelang is closed</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Akhir</th>
            <th>Penanggung Jawab</th>
            <th>Penawar Terakhir</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Lelang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('lelang.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                  <label>Nama Barang :</label>
                  <select class="form-control" id="position-option" name="id_barang" required>
                      @foreach ($barangs as $b)
                        @if ($b->status == 'new')
                          <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endif
                      @endforeach
                  </select>
                  </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Tanggal Mulai :</label>
                  <input type="date" class="form-control" placeholder="Enter ..." name="tgl_mulai" required>
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Tanggal Akhir :</label>
                    <input type="date" class="form-control" id="recipient-name" name="tgl_akhir" required>
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
@endsection