@extends('layouts.main')
@section('content')
<!-- client-project-post-page-area -->
<section class="project-post-page-area overflow-fix content-bg">
	<div class="container my-container">
		@if(Session::has('success'))
		    {{ Session::get('success')->time }}
		@endif
		@if(Session::has('error'))
		    {{ Session::get('error')->time }}
		@endif
		<div class="row">
			<form class="col-lg-12" role="form" action="{{ url('project-post') }}" method="POST" enctype="multipart/form-data" files="true">
				{{ csrf_field() }}
				{{-- <input name="_token" type="hidden" value="{{ csrf_token() }}"/> --}}
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="page-highlight overflow-fix">
						<h2>Project</h2>
					</div>
				</div>
				<div class="project-post-basic-info-area overflow-fix box-white-bg">
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Name/Title:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_title" value="" placeholder="Project Title..." required="" />
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Enter meaningful project name to easily find out your project. For example "Website Design & Development"</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Category:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<select class="project-categories" name="p_category_id" required="">
							  <option value="" selected="selected">--Select--</option>
							  @foreach($projectcat as $procat)
							  <option value="{{ $procat->id }}">{{ $procat->project_cat }}</option>
							  @endforeach
							</select>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify project category to easily categorize the project.</p> 
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Description:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<textarea name="p_description" value="" placeholder="Description.."></textarea>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Clearly describe your project requirements to easily understand what Freelancer will have to do. Any types of contact info are not allowed in requirement details. You can communicate with Freelancers on your project message board.</p>
						</div>
					</div>
				</div>
				<div class="project-post-additional-info-area overflow-fix  box-white-bg">
					<h2>Additional Information</h2>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Job Level</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<select class="project-categories" name="p_joblevel_id" required="">
							  <option value="" selected="selected">--Select--</option>
							  @foreach($joblevel as $job)
							  <option value="{{ $job->id }}">{{ $job->job_level }}</option>
							  @endforeach
							</select>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Which level freelancer do this job?</p>
						</div>
					</div>
					<div id="comment" class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Required Skills:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
						<input type="text" class="required-skills" data-role="tagsinput" name="p_jobskill[]" placeholder="Required Skills.."/>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify required skills that are relevant to this project. Multiple Skills are allowed to select at a time.</p>
						</div>
					</div>
					
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Start Time:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_sdate" value="" required="" id="datepicker">
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify when you start this project?</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Deadline:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_edate" value="" required="" id="datepicker6">
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Specify how many days do you need to complete this project?</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Projet Est. Time:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_less" value="" placeholder="Enter meaningful input here..." required="" />
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>For example "Less than 1 week, Less than 10 hrs/week"</p>
						</div>
					</div>
				</div>
				<div class="project-post-budget-info-area overflow-fix  box-white-bg">
					<h2>Budget</h2>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Rate Type:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<select class="project-categories" name="p_ratetype_id" required="">
							  <option value="" selected="selected">--Select--</option>
							  @foreach($ratetype as $rate)
							  <option value="{{ $rate->id }}">{{ $rate->project_type }}</option>
							  @endforeach
							</select>
							<p><i class="fa fa-info-circle" aria-hidden="true"></i>Small project can be done “fixed price”. & Large project can be done “hourly rate”.</p>
						</div>
					</div>
					<div class="project-post-single-input overflow-fix">
						<div class="project-post-label-area overflow-fix">
							<p>Project Budget:</p>
						</div>
						<div class="project-post-input-area overflow-fix">
							<input type="text" name="p_buddget" value="" placeholder="Project Budget.." />
						</div>
					</div>
				</div>
				<div class="project-post-attachment-area overflow-fix  box-white-bg">
					<h2>Attachment (Optional)</h2>
					<div class="project-post-fileupload-btn overflow-fix">
						<input id="upload-input" type="file" name="p_file[]" class="upload" multiple="multiple"/>
						<span>Drag or Upload Files</span>	
						<div id="file-upload-name"></div>    
					</div>
					@if ($errors->has('p_file'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('p_file') }}</strong>
                        </span>
                    @endif
					<p>You may attach up to 10 files under the size of 25MB each. Include work samples or other documents to support your application. Do not attach your résumé — your Upwork profile is automatically forwarded to the client with your proposal. </p>
				</div>
				{{-- <div class="project-post-payment-option-area overflow-fix  box-white-bg">
					<h2>Payment Option</h2>
					<h6>Choose your payment method</h6>
					<div class="project-post-payment-option  owl-carousel owl-theme overflow-fix">
						<a class="stuff" href="#" data-toggle="modal" data-target="#myModal"><img src="images/paypal-pay.png" alt=""/></a>
						<a class="stuff" href=""><img src="images/mastercard-pay.png" alt=""/></a>
						<a class="stuff" href=""><img src="images/visa-pay.png" alt=""/></a>
					</div>
				</div> --}}
				<div class="project-post-submit-btn-area overflow-fix stuff">
					<button type="submit" class="grren-btn">Post Project</button>
					{{-- <a href="" class="grren-btn">Post Project</a> --}}
					<a href="">Cancel</a>
				</div>
			</form>
		</div>
	</div>

	<!-- Button trigger modal -->
	

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Client Budget Amount</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        {{-- <div class="row"> --}}
        <div class="col-md-8 col-md-offset-2 style_css">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" target="bank">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            {{-- <label for="amount" class="col-md-12 control-label">Client Budget Amount</label> --}}
                            <div class="col-md-12">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </div> --}}
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</section>
<!-- client-project-post-page-area -->


@endsection
@section('style')
<style>
.hidden{ display:none;}
</style>
@endsection

@section('script')
<script type="text/javascript">
	tinymce.init({ selector:'textarea' });

	$( document ).ready(function() {

		// file upload name
		$(document).on('click','.file-remove',function(){
			$(this).parents('.file-remove-icon').remove();

		})

		document.getElementById('upload-input').onchange = uploadOnChange;
		    
		function uploadOnChange() {
		    var filename = this.value;
		    var lastIndex = filename.lastIndexOf("\\");
		    if (lastIndex >= 0) {
		        filename = filename.substring(lastIndex + 1);
		    }
		    var files = $('#upload-input')[0].files;
		    for (var i = 0; i < files.length; i++) {
		     $("#file-upload-name").append('<div class="file-remove-icon">'+files[i].name+'<b class="file-remove">x</b></div>');
		    }

		}

		
		$('#comment').keypress(function(event) {
		    if (event.which == 13) {
		        event.preventDefault();
		        return false;
		    }
		});

		// $(".id1").click(function () {
		// 	alert('called');
		//     //$("#id2").css('visibility','hidden');
		//     $("#id2").css('visibility','visible');
		// });

		$(".stuff").click(function () {
			//alert('call');
	    $(".stuff").addClass('hidden');
	    $(this).removeClass('hidden');
		});
	});
</script>
@endsection

<!-- client-project-post-page-area -->