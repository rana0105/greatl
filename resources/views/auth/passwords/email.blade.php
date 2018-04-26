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
                <form class="login-form overflow-fix" role="form" method="POST" action="{{ route('password.email') }}">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="login-form-input overflow-fix">
                            <p>Email</p>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required="" autofocus="">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="login-form-submit-btn overflow-fix">
                        <input type="submit" class="grren-btn" value="Send to Email">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End login form -->

@endsection
