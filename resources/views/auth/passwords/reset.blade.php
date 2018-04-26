@extends('layouts.main')

@section('content')
<!-- login form -->
<section class="login-form-area overflow-fix">
    <div class="container my-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form-header overflow-fix">
                    <h2>Reset Password</h2>
                </div>              
                @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal login-form overflow-fix" role="form" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="login-form-input overflow-fix">
                                <p>Email</p>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="login-form-input overflow-fix">
                                <p>Password</p>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="login-form-input overflow-fix">
                                <p>Password Confirm</p>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="login-form-submit-btn overflow-fix">
                                <input type="submit" class="grren-btn" value="Reset password">
                            </div>
                        </form>
            </div>
        </div>
    </div>
</section>
<!-- End login form -->

@endsection
