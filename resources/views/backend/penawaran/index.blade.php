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
              <td>{{ $p->lelang->tgl_mulai }} - {{ $p->lelang->tgl_akhir }}</td>
              <td>{{ $p->lelang->barang->nama_barang }}</td>
              <td>{{ $p->lelang->barang->harga_awal }}</td>
              <td>{{ $p->harga_penawaran }}</td>
              {{-- <td>
                @if ($p->harga_penawaran <= $p->lelang->barang->harga_awal)
                    gada
                @else
                  {{ $p->harga_penawaran }}   
                @endif
              </td> --}}
              <td> 
                @if ($p->lelang->status == 'closed')
                Unconfirmed
                @elseif ($p->lelang->id_masyarakat == $p->id_masyarakat)
                {{ $p->lelang->status }}
                @else 
                Anda tidak terpilih
              @endif
              </td>
              <td>
                @if ($p->lelang->status == 'closed')
                <a href="/confirm/{{ $p->id }}" class="btn btn-primary" onclick="return confirm('Are You sure to confirm {{ $p->lelang->barang->nama_barang }} for {{ $p->masyarakat->username }} ?');">Konfirmasi</a>    
                @else
                {{ $p->lelang->barang->nama_barang }} Masih {{ $p->lelang->status }}
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
    <!-- /.card -->
  </div>
@endsection