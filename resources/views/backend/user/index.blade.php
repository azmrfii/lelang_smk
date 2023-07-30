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
        <h3 class="card-title">Data User | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
       </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Level</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->nip }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->level }}</td>
                <td>@if ($u->status == 1)
                    Aktif
                @else
                    Non-Aktif
                @endif
                </td>
                <td>
                    @if($u->status == 1)
                    <a class="btn btn-warning" href="{{ route('user.edit', $u->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-info" href="{{ route('change.password.user', $u->id) }}"><i class="fa fa-lock" aria-hidden="true"></i></a>
                    <a class="btn btn-danger" href="/nonaktif/{{$u->id}}" onclick="return confirm('Are You sure to deactivate {{ $u->username }} account ?');"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    @else
                    <a class="btn btn-info" href="/aktif/{{ $u->id }}" onclick="return confirm('Are You sure to activate {{ $u->username }} account ?');"><i class="fa fa-undo" aria-hidden="true"></i></a> <a href="">This account is deactivate</a>
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Level</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Username :</label>
                    <input type="text" class="form-control" id="recipient-name" name="username"required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">NIP :</label>
                    <input type="number" class="form-control" id="recipient-name" name="nip"required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Email :</label>
                    <input type="email" class="form-control" id="recipient-name" name="email"required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password :</label>
                    <input type="password" class="form-control" id="recipient-name" name="password"required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Level :</label>
                    <select name="level" id="" class="form-control"required>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
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