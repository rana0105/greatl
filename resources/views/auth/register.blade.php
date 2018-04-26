@extends('layouts.main')

@section('content')
<!-- Singup form -->
<section class="singup-form-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="singup-form-header overflow-fix">
					<h2>Become great neighbour member!</h2>
				</div>
				<form class="singup-form overflow-fix" role="form" method="POST" action="{{ url('register') }}">
          @if(session('error'))
            <div class="alert alert-danger old-pass">
              {{ session('error') }}
            </div>
          @endif
					{{ csrf_field() }}
					<input type="hidden" name="currenturl" id="currenturl" value="{{ Request::url() }}">
					<div class="singup-form-check-box overflow-fix d-flex justify-content-between  align-items-center">
						 <p>What are you looking for?</p>

						 <fieldset class="switch">
              <input id="yes" name="urole" value="3" type="radio" checked="" required="">
              <label class="some-hire" for="yes">Hire</label>
              <input id="no" name="urole" type="radio" value="2"  required="">
              <label class="some-work" for="no">Work</label>
              <span class="switch-button"></span>
            </fieldset>
            {{-- <input type="hidden" id="latlong" name="geolocation" value=""> --}}
					</div>

					<div class="singup-form-input overflow-fix">
						<p>First Name</p>
						<input type="text" name="first_name" required="">
					</div>
					<div class="singup-form-input overflow-fix">
						<p>Last Name</p>
						<input type="text" name="last_name" required="">
					</div>
					<div class="singup-form-input overflow-fix">
						<p>Username</p>
						<input id="lower" type="text" name="username" pattern="[a-z0-9]+" title="Only lowercase / numbers allowed" required="">
            @if ($errors->has('username'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('username') }}</strong>
                </span>
            @endif
					</div>
					<div class="singup-form-input overflow-fix">
						<p>Email</p>
						<input type="email" name="email" required="">
            @if ($errors->has('email'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('email') }}</strong>
                </span>
            @endif
					</div>
					<div class="singup-form-input overflow-fix">
						<p>Password</p>
						<input type="password" name="password" required="">
            @if ($errors->has('password'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('password') }}</strong>
                </span>
            @endif
					</div>
					<div class="singup-form-input overflow-fix">
						<p>Retype Password</p>
						<input type="password" name="password_confirmation" required="">
            @if ($errors->has('password_confirmation'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
					</div>
					<div class="singup-form-checkbox overflow-fix">
						<label class="custom-control custom-checkbox">
						  <input type="checkbox" class="custom-control-input" name="privacy" required="">
						  <span class="custom-control-indicator"></span>
						  <span class="custom-control-description">
							By creating an account, you agree to our
							<a href="">Term of Use and Privacy policy.</a>
              <br>
              @if ($errors->has('privacy'))
                <span class="help-block errshow">
                    <strong class="errshow">{{ $errors->first('privacy') }}</strong>
                </span>
              @endif
						  </span>
						</label>
					</div>
					<div class="singup-form-submit-btn overflow-fix">
						<input type="submit" class="grren-btn" value="SingUp">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End Singup form -->
@endsection

@section('style')

<style type="text/css">
	.switch {
  position: relative;
  border: 0;
  padding: 0;
  width: 70px;
  font-family: helvetica;
  font-size: 22px;
  color: #222;
  text-shadow: 0 1px 0 rgba(255, 255, 255, .3);
  background:#0d9b49;
   border-radius: 30px;
   height: 27px;

}

.switch legend {
  float: left;
  width: 100%;
  padding: 7px 10% 3px 0;
  text-align: right;
}
 
.switch input {
  position: absolute;
  opacity: 0;
}

.switch legend:after {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  z-index: 0;
  width: 50%;
  height: 100%;
  padding: 2px;
  background-color: #222;
  border-radius: 3px;
  box-shadow: inset -1px 2px 5px rgba(0, 0, 0, .8), 0 1px 0 rgba(255, 255, 255, .2);
}

.switch label {
    position: relative;
    z-index: 2;
    float: left;
    width: 29px;
    margin-top: 2px;
    padding: 5px 0 3px 0;
    text-align: center;
    color: #fff;
    text-shadow: 0 1px 0 #000;
    cursor: pointer;
    transition: color 0s ease .1s;
    font-size: 11px;
  height: 16px;
  margin-left: 2px
  ;
}

.switch input:checked + label {
  color: #2d592a;
  text-shadow: 0 1px 0 rgba(255, 255, 255, .5);
  opacity:0;
}

.switch input:focus + label {
  outline: none;
}

.switch .switch-button {
    clear: both;
    position: absolute;
    top: -2px;
    left: -1%;
    z-index: 1;
    width: 30px;
    height: 30px;
    background-color: #fff;
    transition: all .3s ease-out;
    border-radius: 50%;
    z-index: 99;
  cursor: pointer;
  box-shadow: 0px 0px 1px 0px #000;
}


    

.switch .switch-button:after {
  content: " ";
  position: absolute;
  z-index: 1;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  border-radius: 3px;
}

.switch input:last-of-type:checked ~ .switch-button {
  left: 45px;
}
.some-hire {
    margin-left: 5px !important;
}
.some-work {
    margin-left: 0 !important;
}

span.help-block.errshow {
      padding-left: 0px;
      color: red;
      font-size: 10px;
      margin-bottom: 3px;
      
  }

</style>

@endsection

@section('script')

<script type="text/javascript">
$( document ).ready(function() {
    $("#change_button").on('click', function()
	{
	if (this.value=="Hire") this.value = "Work";
    else this.value = "Hire";
	});

});

</script>
@endsection

	
