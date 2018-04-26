@extends('layouts.main')
@section('content')
<!-- login-freelancer-profile-setting-area -->
<section class="login-freelancer-profile-setting-area content-bg overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-4">
				<div class="login-freelancer-profile-setting-sidebar-area overflow-fix">
					<ul>
						<li class="active" >
							<a href="#profile" >Profile</a>
						</li>
						<li>
							<a href="#contact-info" >Contact info</a>
						</li>
						<li>
							<a href="#profile-setting" >Profile Setting</a>
						</li>
						<li>
							<a href="#myProfile" >My Profile</a>
						</li>
						<li>
							<a href="#password" >Password</a>
						</li>
						<li>
							<a href="#membership-bid" >Membership & Bid</a>
						</li>
						<li>
							<a href="#languages" >Languages</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="login-freelancer-profile-setting-content-area overflow-fix">
					<div id="profile" class="box-white-bg padding-to login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>Profile Details</h2>
							@if(session('successpd'))
								<div class="alert alert-success">
									{{ session('successpd') }}
								</div>
							@endif
						</div>
						<form class="login-freelancer-profile-single-item-content overflow-fix" role="form" action="{{ route('freelancer.profile.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Name</p>
								<input type="text" name="name" value="{{ $uprofile->name }}" />
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>User id</p>
								<input type="text" name="username" value="{{ $uprofile->username or old('username')}}" required=""/>
								@if ($errors->has('username'))
                                    <span class="help-block errshow">
                                        <strong class="errshow">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Email</p>
								<input type="email" name="email" value="{{ $uprofile->email or old('email')}}" required=""/>
								@if ($errors->has('email'))
                                    <span class="help-block errshow">
                                        <strong class="errshow">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Photo</p>
								<div class="box overflow-fix d-flex align-items-end">
									<div class="profile-img-upload-area js--image-preview overflow-fix" style="background-image: url({{ url('app_images/resize_images/')}}/{{ $profile->p_image or 'Default' }});">
									<img src="">
									</div>
									<div class="profile-img-upload-button overflow-fix">
										<input type="file" class="image-upload" name="p_image" accept="media_type/*"/>
										<span>Change Photo</span>	
									</div>
								</div>
							</div>
							<div class="form-smubit-ny overflow-fix">
								<button type="submit">Update</button>
								<a href="">Cancel</a>
							</div>
						</form>
					</div>
					
					<div id="contact-info" class="box-white-bg padding-to login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>Contact info</h2>
							@if(session('successpi'))
								<div class="alert alert-success">
									{{ session('successpi') }}
								</div>
							@endif
						</div>
						<form class="login-freelancer-profile-single-item-content overflow-fix" role="form" action="{{ route('freelancer.contact.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Timezone</p>
								<select class="project-categories" name="timezone" value="">
									  @foreach(config('timeZone.zones') as $zone)
									  	<option 
									  		value="{{$zone['value']}}"

									  		@if($zone['value'] == $profile->timezone)
									  			selected="selected"
									  		@endif
									  		>{{$zone['name']}}
									  	</option>
								  	@endforeach
								</select>
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Country</p>
								<select class="project-categories" name="country" value="">
									@foreach(config('country.countries') as $country)
									  	<option 
									  		value="{{$country['name']}}"
									  		@if($country['name'] == $profile->country)
									  			selected="selected"
									  		@endif
									  		>{{$country['name']}}
									  	</option>
								  	@endforeach
								</select>
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>City</p>
								<select class="project-categories" name="city" value="">
									@foreach(config('state.states') as $state)
									  	<option 
									  		value="{{$state['name']}}"
									  		@if($state['name'] == $profile->city)
									  			selected="selected"
									  		@endif
									  		>{{$state['name']}}
									  	</option>
								  	@endforeach
								</select>
							</div>
							<div class="login-freelancer-profile-single-item-input address-setiong overflow-fix " >
								<p>Address</p>
								<textarea style="height: 70px; max-width:360px;" type="text" name="address" value="{{ $profile->address }}">{{ $profile->address }}</textarea>
							</div>
							<div class="login-freelancer-profile-single-item-input postal-code overflow-fix">
								<p>Postal Code</p>
								<input type="number" name="postal_code" value="{{ $profile->postalcode }}" />
							</div>
							<div class="login-freelancer-profile-single-item-input phone-number-me overflow-fix">
								<p>Phone</p>
								<input class="phone-nber" type="number" name="phone" value="{{ $profile->phone }}" />
							</div>
							
							<div class="form-smubit-ny overflow-fix">
								<button type="submit">Update</button>
								<a href="">Cancel</a>
							</div>
						</form>
					</div>
					<div id="profile-setting" class="box-white-bg padding-to login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>Profile Setting</h2>
							@if(session('successps'))
								<div class="alert alert-success">
									{{ session('successps') }}
								</div>
							@endif
						</div>
						<form class="login-freelancer-profile-single-item-password overflow-fix" role="form" action="{{ route('freelancer.setting.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<div id="entry" class="login-freelancer-profile-single-item-checkbox overflow-fix checkl">
								<input type="checkbox" checked="checked"  class="radio checkl" name="level" value="Entry Level" />
								@if($profile->level ==  'Entry Level')
								<input type="checkbox" checked=""  class="entry" name="level" value="{{ $profile->level }}" />
								@endif
								<label>
									<h5>Entry Level</h5>
									<span>Starting to build experience in my field of work </span>
								</label>
							</div>
							<div id="inter" class="login-freelancer-profile-single-item-checkbox overflow-fix checkl">
								<input type="checkbox" checked="checked"  class="radio checkl" name="level" value="Intermediate Level" />
								@if($profile->level ==  'Intermediate Level')
								<input type="checkbox" checked=""  class="inter" name="level" value="{{ $profile->level }}" />
								@endif
								<label>
									<h5>Intermediate Level</h5>
									<span>A few years of professional experience in my field </span>
								</label>
							</div>
							<div id="expert" class="login-freelancer-profile-single-item-checkbox overflow-fix checkl">
								<input type="checkbox" checked="checked"  class="radio checkl" name="level" value="Expert Level" />
								@if($profile->level ==  'Expert Level')
								<input type="checkbox" checked=""  class="expert" name="level" value="{{ $profile->level }}" />
								@endif
								<label>
									<h5>Expert Level</h5>
									<span>A few years of professional experience in my field </span>
								</label>
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Categories</p>
								<select class="project-categories" name="category">
									  <option value="{{ $profile->project_category_id }}" selected="selected">--{{ $profile->projectcats->project_cat or 'Default' }}--</option>
									  @foreach($pro as $p)
									  <option value="{{ $p->id }}">{{ $p->project_cat }}</option>
									  @endforeach
								</select>
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Social Links</p>
								<a href="">
								<div class="login-freelancer-profile-single-item-social overflow-fix">
									<i class="fa fa-facebook" aria-hidden="true"></i>
									<p>Facebook</p>
								</div>
								</a>
								<a href="">
								<div class="login-freelancer-profile-single-item-social overflow-fix">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
									<p>Linkedin</p>
								</div>
								</a>
								<a href="">
								<div class="login-freelancer-profile-single-item-social active overflow-fix">
									<i class="fa fa-twitter" aria-hidden="true"></i>
									<p>Twitter</p>
								</div>
								</a>
							</div>
							<div class="form-smubit-ny overflow-fix">
								<button type="submit">Update</button>
								<a href="">Cancel</a>
							</div>
						</form>
					</div>
					<div id="myProfile" class="box-white-bg padding-to login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>My Profile</h2>
							@if(session('successm'))
								<div class="alert alert-success">
									{{ session('successm') }}
								</div>
							@endif
						</div>
						<form class="login-freelancer-profile-single-item-content overflow-fix" role="form" action="{{ route('freelancer.myprofile.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<div class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Position / Designation</p>
								<input type="text" name="designation" value="{{ $profile->designation }}" />
							</div>
							<div id="comment" class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Skill</p>
								<input class="required-skills" data-role="tagsinput" name="skill[]" type="text" value="{{ $profile->skill }}" />
								<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify required skills that are relevant to this project. Multiple Skills are allowed to select at a time.</p>
							</div>
							<div class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Overview</p>
								<textarea type="text" name="overview" value="{{ $profile->overview }}">{{ $profile->overview }}</textarea>
							</div>
							<div class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Hourly Rate ($)</p>
								<input type="text" name="hrate" value="{{ $profile->hourly_rate }}" />
							</div>
							<div class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Experience</p>
								<input type="text" name="experience" value="{{ $profile->experience }}" />
							</div>
							<div class="login-freelancer-profile-single-item-input full-width overflow-fix">
								<p>Availability</p>
								<input type="text" name="availability" value="{{ $profile->availability }}" />
							</div>
							<div class="form-smubit-ny overflow-fix">
								<button type="submit">Update</button>
								<a href="">Cancel</a>
							</div>
						</form>
					</div>
					<div id="profile" class="box-white-bg padding-to  login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>Change Password</h2>
							@if(session('successpas'))
								<div class="alert alert-success">
									{{ session('successpas') }}
								</div>
							@endif
						</div>
						<form class="login-freelancer-profile-single-item-password overflow-fix" role="form" action="{{ route('freelancer.password.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<input type="hidden"  name="role_idu" value="{{ Auth::user()->role_idg }}">
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Current Password</p>
								@if(session('successp'))
									<div class="alert alert-success">
										{{ session('successp') }}
									</div>
								@endif
								@if(session('error'))
									<div class="alert alert-danger old-pass">
										{{ session('error') }}
									</div>
								@endif
								<input id="password" type="password" name="old_password" value="{{ $password or old('password') }}" required="" autofocus/>
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>New Password</p>
								<input id="new_password" type="password" name="new_password" required="" /><br/>
								@if ($errors->has('new_password'))
                                    <span class="help-block errshow">
                                        <strong class="errshow">{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Confirm Password</p>
								<input id="password-confirm" type="password" name="password_confirmation" required=""><br/>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block errshow">
                                        <strong class="errshow">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-smubit-ny overflow-fix">
								<button type="submit">Update</button>
								<a href="">Cancel</a>
							</div>
						</form>
					</div>
					<div id="membership-bid" class="box-white-bg padding-to login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
						<div class="login-freelancer-profile-single-item-headding overflow-fix">
							<h2>Membership & Bid</h2>
						</div>
						<form class="login-freelancer-profile-single-item-payment overflow-fix" role="form" action="{{ route('freelancer.membership.update') }}" method="POST" enctype="multipart/form-data" files="true">
							{{ csrf_field() }}
							<div class="login-freelancer-profile-single-item-blance overflow-fix d-flex  justify-content-between">
								<div class="login-freelancer-profile-single-item-blane-cnet">
									<h6>Current Plan</h6>
									<p>Basic Freelancer - 15 Bids/week</p>
								</div>
								<div class="form-smubit-ny align-self-center">
									<button type="submit">Upgrade Now</button>
								</div>
							</div>
						</form>
					</div>
					<div id="languages" class="box-white-bg padding-to  login-freelancer-profile-setting-profile login-freelancer-profile-single-item overflow-fix">
					<form class="login-freelancer-profile-single-item-payment overflow-fix" role="form" action="{{ route('freelancer.language.update') }}" method="POST" enctype="multipart/form-data" files="true">
						{{ csrf_field() }}
						@if(session('successl'))
							<div class="alert alert-success">
								{{ session('successl') }}
							</div>
						@endif
						@if(session('errord'))
							<div class="alert alert-danger">
								{{ session('errord') }}
							</div>
						@endif
						<div class="login-freelancer-profile-single-item-headding overflow-fix d-flex justify-content-between align-items-center">
							<h2>Languages</h2>
							
							<button type="submit">Add</button>
						</div>
						<div class="login-freelancer-profile-single-item-password overflow-fix">
							<div class="login-freelancer-profile-single-item-input overflow-fix">
								<p>Language</p>
								<select class="project-categories" name="language" required="">
									  <option value="" selected="selected">--Select--</option>
									  <option value="Arabic">Arabic</option>
									  <option value="English">English</option>
									  <option value="Chinese">Chinese</option>
									  <option value="Bengali">Bengali</option>
									  <option value="Spanish">Spanish</option>
									  <option value="Hindi">Hindi</option>
									  <option value="Portuguese">Portuguese</option>
									  <option value="Russian">Russian</option>
									  <option value="Japanese">Japanese</option>
									  <option value="French">French</option>
								</select>
							</div>
							<div class="login-freelancer-profile-single-item-input login-freelancer-profile-proficiency overflow-fix">
								<p>Proficiency</p>
								<select class="project-categories" name="proficiency" required="">
									  <option value="" selected="selected">--Select--</option>
									  <option value="Basic">Basic</option>
									  <option value="Conversational">Conversational</option>
									  <option value="Fluent">Fluent</option>
									  <option value="Native or Bilingual">Native or Bilingual</option>
								</select>
							</div>
						</div>
						
					</form>
					<div class="language-view overflow-fix">
							<ul class="">
							@foreach($lan as $l)
							<form action="{{ route('language', $l->id) }}" method="post">
							<input type="hidden" name="upid" value="{{ $uprofile->id }}">
							{{ csrf_field() }}
								<li>{{ $l->language }}:<span>{{ $l->proficiency }}</span><button><i class="fa fa-times" aria-hidden="true"></i></button>
								</li>
							</form>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End login-freelancer-profile-setting-area -->
@endsection

@section('style')

<style type="text/css">
	div#map-canvas{
		width: 460px;
		height: 300px;
	}

	.alert.alert-danger.old-pass {
	    padding: 2px 2px 2px 5px;
	    margin-bottom: 2%;
	    font-size: 10px;
	    width: 70%;
	}

	span.help-block.errshow {
	    padding-left: 0px;
	    color: red;
	    font-size: 10px;
	    margin-bottom: 3px;
	    
	}
	strong.errshow {
		margin-left: -279px;
	}

</style>

@endsection

@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    $('input[type="checkbox"]').on('change', function() {
	   $('input[type="checkbox"]').not(this).prop('checked', false);
	});

	$('.errshow').delay(2000).fadeOut();


	$('#comment').keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        return false;
	    }
	});

	$( window ).on( "load", function() {
        var entry = $('.entry').val();
        var inter = $('.inter').val();
        var expert = $('.expert').val();
        if(entry == 'Entry Level'){
        	$('.checkl').prop('checked', true); 
	 		  	$('.checkl').prop('checked', false);
        }
        else if(inter == 'Intermediate Level'){
        	$('.checkl').prop('checked', true); 
	 		  	$('.checkl').prop('checked', false);
        }else{
        	$('.checkl').prop('checked', true); 
	 		  	$('.checkl').prop('checked', false);
        }
  	});

});
	
</script>

@endsection