@extends('backend.layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if (Auth::user()->level == 'petugas')      
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
                    @foreach ($lelang as $l)
                    @if ($l->confirm_date != null)
                    <tr>
                      <td>{{ $l->masyarakat->nik }}</td>
                      <td>{{ $l->masyarakat->name }}</td>
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
          </div>
          </div>
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Riwayat Penawaran</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th>Alamat</th>
                        <th>Periode Lelang</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Harga Akhir</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($penawarans as $p)
                        <tr>
                          <td>{{ $p->masyarakat->nik }}</td>
                          <td>{{ $p->masyarakat->name }}</td>
                          <td>{{ $p->masyarakat->email }}</td>
                          <td>{{ $p->masyarakat->no_hp }}</td>
                          <td>{{ $p->masyarakat->alamat }}</td>
                          <td>{{ @$p->lelang->tgl_mulai }} - {{ @$p->lelang->tgl_akhir }}</td>
                          <td>{{ @$p->lelang->barang->nama_barang }}</td>
                          <td>{{ @$p->lelang->barang->harga_awal }}</td>
                          <td>{{ $p->harga_penawaran }}</td>
                          
                          <td> 
                            @if (@$p->lelang->status == 'closed')
                            Unconfirmed
                            @elseif (@$p->lelang->id_masyarakat == $p->id_masyarakat)
                            {{ @$p->lelang->status }}
                            @else 
                            Anda tidak terpilih
                          @endif
                          </td>
                          <td>
                            @if (@$p->lelang->status == 'closed')
                            <a href="/confirm/{{ $p->id }}" class="btn btn-primary" onclick="return confirm('Are You sure to confirm {{ $p->lelang->barang->nama_barang }} for {{ $p->masyarakat->username }} ?');">Konfirmasi</a>    
                            @elseif (@$p->lelang->status == 'confirmed')
                            {{ @$p->lelang->barang->nama_barang }} Telah 
                              @if (@$p->lelang->status == 'confirmed')
                                  Terjual  
                              @endif
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th>Alamat</th>
                        <th>Periode Lelang</th>
                        <th>Nama Barang</th>
                        <th>Harga Awal</th>
                        <th>Harga Akhir</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
          </div>
          @else
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Lelang Berlansung</h3>
                  {{-- <h3 class="card-title">Data Lelang |  <a href="{{ route('lelangtambah') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Periode Lelang</th>
                      <th>Barang</th>
                      <th>Harga Awal</th>
                      {{-- <th>Status</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($lelangs as $l)
                    
                      <tr>
                        <td>{{ $l->tgl_mulai }} - {{ $l->tgl_akhir }}</td>
                        <td>{{ $l->nama_barang}}</td>
                        <td>Rp. {{ number_format($l->harga_awal) }}</td>
                        {{-- <td>{{ $l->status }}</td> --}}
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Tanggal Mulai</th>
                      <th>Barang</th>
                      <th>Harga Awal</th>
                      {{-- <th>Status</th> --}}
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          @endif
    </div>
</div>

@endsection