@extends('backend.layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Data User : {{ $user->username }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="name" value="{{ $user->name }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="username" value="{{ $user->username }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label>NIP</label>
                <input type="number" class="form-control" placeholder="Enter ..." name="nip" value="{{ $user->nip }}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter ..." name="email" value="{{ $user->email }}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Level</label>
                @if ($user->level == 'admin')
                <select name="level" id="" class="form-control">
                   <option value="admin" selected>admin</option>
                   <option value="petugas">petugas</option>
                </select>
                @else
                <select name="level" id="" class="form-control">
                   <option value="admin">admin</option>
                   <option value="petugas" selected>petugas</option>
                </select>
                @endif
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button> |
          <a href="{{ route('user.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection