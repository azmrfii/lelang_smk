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
        <h3 class="card-title">Data Masyarakat</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>username</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Alamat</th>
            <th>Tanggal Join</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($masyarakats as $masyarakat)
            <tr>
                <td>{{ $masyarakat->nik }}</td>
                <td>{{ $masyarakat->name }}</td>
                <td>{{ $masyarakat->username }}</td>
                <td>{{ $masyarakat->jk }}</td>
                <td>{{ $masyarakat->email }}</td>
                <td>{{ $masyarakat->no_hp }}</td>
                <td>{{ $masyarakat->alamat }}</td>
                <td>{{ $masyarakat->tgl_join }}</td>
                <td>@if ($masyarakat->status == 1)
                      New
                    @else
                      Block
                    @endif
                </td>
                <td>
                  @if($masyarakat->status == 1)
                  <a class="btn btn-danger" href="/block/{{$masyarakat->id}}" onclick="return confirm('Anda yakin akan blockir {{ $masyarakat->username }} ?');"><i class="fa fa-lock" aria-hidden="true"></i></a>
                  @endif
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>username</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Alamat</th>
            <th>Tanggal Join</th>
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