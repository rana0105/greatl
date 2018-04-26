@extends('layouts.main')

@section('content')
<!-- login form -->
<section class="login-form-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login-form-header overflow-fix">
					<h2>Login and get back to work</h2>
				</div>				
				<form class="login-form overflow-fix" role="form" method="POST" action="{{ url('login') }}">
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
				@if(session('warning'))
					<div class="alert alert-success">
						{{ session('warning') }}
					</div>
				@endif
				@if(session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif
					<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
					<div class="form-group{{ $errors->has('emailuser') ? ' has-error' : '' }}">
						<div class="login-form-input overflow-fix">
							<p>Email or Username</p>
							<input id="email" type="text" name="emailuser" value="{{ old('emailuser') }}" required="" autofocus="">
							@if ($errors->has('emailuser'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('emailuser') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="login-form-input overflow-fix">
							<p>Password</p>
							<input id="password" type="password" name="password" required="">
							@if ($errors->has('password'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('password') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="login-form-checkbox overflow-fix">
						<label class="custom-control custom-checkbox">
						  <input type="checkbox" class="custom-control-input">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description">
							Remember me
						  </span>
						</label>
					</div>
					<div class="forgot-password overflow-fix">
						<a href="{{ route('password.request') }}">Forgot Password?</a>
					</div>
					<div class="login-form-submit-btn overflow-fix">
						<input type="submit" class="grren-btn" value="login">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End login form -->
@endsection