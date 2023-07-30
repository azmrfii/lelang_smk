

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>{{ __('Login Page') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="assetsss/login.css">
  <script>window.console = window.console || function(t) {};</script>
  <script>
    if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
    }
  </script>
</head>
<body translate="no" >
<div class="container" id="container">
	<div class="form-container sign-up-container">
        <form action="{{ route('processlogin') }}" method="POST">
            @csrf
            @method('POST')
			<h1>Login Admin</h1>
			<div class="social-container">
			</div>
			<span>Admin or User please login in here.</span>
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			<input type="password" name="password" placeholder="Password" />
			<button type="submit">{{ __('Login') }}</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
        <form action="{{ route('masyarakat/login') }}" method="POST">
            @csrf
			<h1>Login Masyarakat</h1>
			<div class="social-container">
			</div>
			<span>Masyarakat please login in here.</span>
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			<input type="password" name="password" placeholder="Password" />
			<button type="submit">{{ __('Login') }}</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>You are not an admin?</h1>
				<p>Login here if You are not Admin.</p>
				<button class="ghost" id="signIn">Login Masyarakat</button>
                {{-- <a href="{{ route('index') }}"><button class="ghost">Back</button></a> --}}
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Are You Admin?</h1>
				<p>Login here if You are Admin.</p>
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Register
                </a>
				<button class="ghost" id="signUp">Login Admin</button>
                <a href="/"><button class="ghost">Back</button></a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Masyarakat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('register') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
            <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Enter NIK" required>
            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name"required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" name="password" id="password"required class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="text" name="username" id="username"required class="form-control @error('username') is-invalid @enderror" placeholder="Enter Username">
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror" required autocomplete="jk"required>
                <option value="Perempuan">{{ __('Perempuan') }}</option>
                <option value="Laki-laki">{{ __('Laki-laki') }}</option>
            </select>
            <input type="number" name="no_hp" id="no_hp"required class="form-control @error('no_hp') is-invalid @enderror" placeholder="Enter No. Handphone">
            @error('no_hp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="hidden" name="tgl_join" id="tgl_join" class="form-control @error('tgl_join') is-invalid @enderror">
            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required cols="30" rows="5"></textarea>
            {{-- <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="Masukkan Nama"> --}}
            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
</div>
{{-- @include('sweetalert::alert') --}}

{{-- Sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script id="rendered-js" >
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});
//# sourceURL=pen.js
    </script>
</body>
</html>