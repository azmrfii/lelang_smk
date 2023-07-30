@extends('backend.layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Data User : {{ $user->username }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('dochange.password.user', $user->id) }}" method="post">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="oldUsername" value="{{ $user->username }}" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="New Password" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Change</button> |
          <a href="{{ route('user.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection
