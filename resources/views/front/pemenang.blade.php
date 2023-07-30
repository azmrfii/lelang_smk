@extends('front.de')
@section('content')
<section class="padding-large" style="background-color: white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Riwayat Pemenang Lelang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>NIK</th>
                          <th>Username</th>
                          <th>Barang Lelang</th>
                          <th>Harga Awal</th>
                          <th>Harga Penawaran</th>
                          {{-- <th>Status</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($lelangs as $l => $ll)
                            <tr>
                              <td>{{ $ll->nik }}</td>
                              <td>{{ $ll->username }}</td>
                              <td>{{ $ll->nama_barang }}</td>
                              <td>{{ $ll->harga_awal }}</td>
                              <td>{{ $ll->harga_penawaran }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>NIK</th>
                          <th>Username</th>
                          <th>Barang Lelang</th>
                          <th>Harga Awal</th>
                          <th>Harga Penawaran</th>
                          {{-- <th>Status</th> --}}
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    </section>
    @endsection