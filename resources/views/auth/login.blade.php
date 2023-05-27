@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="auth/css/style.css">
  <link rel="stylesheet" href="auth/fonts/linearicons/style.css">

<div class="wrapper">
			<div class="inner" >
				<img src="auth/images/image-1.png" alt="" class="image-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<h3>Login</h3>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                    </div>
                  
					<button>
						<span>Login</span>
					</button>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Create New Account?') }}
                                    </a>
                    @endif
				</form>
				<img src="auth/images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="auth/js/jquery-3.3.1.min.js"></script>
		<script src="auth/js/main.js"></script>
        
@endsection
