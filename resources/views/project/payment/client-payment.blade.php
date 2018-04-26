@extends('layouts.main')
@section('content')
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="all-search-porject-count-area overflow-fix">
					<p>Client Payment History For Single Project</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-search-area -->

<section class="client-payment-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<p class="new-title-soundme-adds">Payment to system when project due</p>
			</div>
			<div class="col-lg-4">
				<div class="client-payment-single-area overflow-fix d-flex align-items-center">
					<div class="icon-area-ofpyament overflow-fix">
						<i class="fa fa-database" aria-hidden="true"></i>
					</div>
					<div class="client-payment-single-right-area">
						<h2>Project Budget</h2>
						<p><span><i class="fa fa-usd" aria-hidden="true"></i></span>{{ $project->p_buddget }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="client-payment-single-area overflow-fix d-flex align-items-center">
					<div class="icon-area-ofpyament overflow-fix">
						<i class="fa fa-database" aria-hidden="true"></i>
					</div>
					<div class="client-payment-single-right-area">
						<h2>Deposit</h2>
						<p><span><i class="fa fa-usd" aria-hidden="true"></i></span>{{ $project->deposit->sum('payment') }}</p>
					</div>
				</div>
			</div>
			<?php $currentPayment = $project->deposit->sum('payment') - $project->p_buddget ?>
			@if($currentPayment < 0)
			<div class="col-lg-4 pay-now-background">
				<div class="client-payment-single-area overflow-fix d-flex align-items-center">
					<div class="icon-area-ofpyament overflow-fix">
						<i class="fa fa-database" aria-hidden="true"></i>
					</div>
						<div class="client-payment-single-right-area">
							<a href="{{ route('project.payment', $project) }}">
								<h2>Pay Now</h2>
							<p><span><i class="fa fa-usd" aria-hidden="true"></i></span>{{(-1)*$currentPayment}}</p>
							</a>
						</div>
				</div>
			</div>
			@else
			<div class="col-lg-4">
				<div class="client-payment-single-area overflow-fix d-flex align-items-center">
					<div class="icon-area-ofpyament overflow-fix">
						<i class="fa fa-database" aria-hidden="true"></i>
					</div>
					<div class="client-payment-single-right-area">
						<h2>Advanced</h2>
						<p><span><i class="fa fa-usd" aria-hidden="true"></i></span>{{$currentPayment}}</p>
					</div>
				</div>
			</div>
			@endif
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="client-payment-single-input-area-new overflow-fix">
					<p>Pay to you freelancer</p>
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<form class="client-payment-single-input-area overflow-fix d-flex justify-content-center" action="{{ route('payment.history.post', $project) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="job_post_id" value="{{ $project->id }}">
						<input name="client_pay" placeholder="Amount $" type="number" required=""/>
						<select id="headerselect" class="header-search" name="freelancer_id" required="">
							@if($project->hired->count() > 0)
						  	<option value="">Select Freelancers</option>
						  	@foreach($project->hired as $hiredFreelencer)
						  		<option value="{{ $hiredFreelencer->jobapplyfree->id }}">{{ $hiredFreelencer->jobapplyfree->name }}</option>
						  	@endforeach
						  	@else
						  	@endif
						</select>
						<button type="submit">Submit</button>
					</form>
					<div class="message-box box-white-bg overflow-fix table-responsive" style="margin-top: 3%;">
						<table class="table table-striped">
							@if(sizeof($project->hired) > 0)
							<thead>
								<tr>
									<th style="text-align: center;">Sr.</th>
									<th style="text-align: center;">Freelancer Name</th>
									<th style="text-align: center;">Bid Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php $sr = 1; ?>
								@foreach($project->hired as $hiredFreelencer)
									<tr>
										<td>{{ $sr++ }}</td>
										<td>{{ $hiredFreelencer->jobapplyfree->name }}</td>
										<td>{{ $hiredFreelencer->bidamount }}</td>
									</tr>
								@endforeach
							</tbody>
							@endif
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 3%">
			<div class="col-lg-12">
				<div class="message-box box-white-bg overflow-fix table-responsive">
					<h3 class="text-center title" style="margin-top: 2%;">Project Name: {{ $project->p_title }}</h3>
					<table class="table table-striped " style="margin-top: 2%;">
						@if(sizeof($clientPayHistory) > 0)
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Date</th>
								<th>Payment ID</th>
								<th>Payer ID</th>
								<th>Total Payment</th>
							</tr>
						</thead>
						<tbody>
							<?php $sr = 1; ?>
							@foreach($clientPayHistory as $history)
								<tr>
									<td>{{ $sr++ }}</td>
									<td>{{ date('d-M-Y', strtotime($history->payment_create)) }}</td>
									<td>{{ $history->payment_id }}</td>
									<td>{{ $history->PayerID }}</td>
									<td>{{ $history->payment }}</td>
								</tr>
							@endforeach
							<tr>
							<td colspan="4" style="text-align: right;">Total</td>
							<td>{{ $project->deposit->sum('payment') }}</td>
							</tr>
						</tbody>
						@else
						<div class="pay-edit">
							<a href="{{ route('project.payment', $project) }}">Pay Now</a>
						</div>
						@endif
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('style')
<style>

p.new-title-soundme-adds {
    text-align: center;
    margin-bottom: 27px;
}

.client-payment-single-area.overflow-fix.d-flex.align-items-center {
    margin-bottom: 60px;
}
.pay-now-background .client-payment-single-area {
    background: #c1bc1f9e;
}
.pay-now-background:hover .client-payment-single-area {
    background: #9490139e;
}
.all-search-porject-count-area p {
    color: #fff;
    font-size: 18px;
    padding-bottom: 45px;
    padding-top: 155px;
}
section.client-payment-area.overflow-fix {
    padding: 50px 0;
}
.client-payment-single-input-area li p span {
    font-weight: 600;
    margin-right: 9px;
}

.client-payment-single-input-area li p span:nth-child(2) {
    font-size: 13px;
}
.client-payment-single-area {
    box-shadow: 0px 0px 2px 0px #000;
    margin-bottom: 20px;
    padding: 20px 0;
}


.client-payment-single-area h2 {
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 14px;
}

.client-payment-single-area p i {
    color: #0d9b49;
    margin-right: 3px;
}
.client-payment-single-input-area button {
    float: left;
    border: 1px solid #08622e;
    font-size: 13px;
    height: 36px;
    width: 150px;
    background: #fff;
	color:#fff;
    cursor: pointer;
	    border-radius: 0px 4px 4px 0;
		    background: #0d9b49;
}
.client-payment-single-input-area button:hover {
    background:rgba(13, 155, 73, .8);
	color:#fff;
}

.client-payment-single-input-area .select2 {
    float: left;
	min-width:150px;
}

.client-payment-single-input-area .select2-container--default .select2-selection--single {
    border: 1px solid #08622e;
    border-radius: 0;
    height: 36px;
    border-right: 0;
    line-height: 36px;
}

.client-payment-single-input-area .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 35px;
    font-size: 14px;
	padding-left:12px;
}

.client-payment-single-input-area span.select2-selection__arrow {
    margin-top: 4px;
}
form.client-payment-single-input-area
 input {
    float: left;
    height: 36px;
    border: 1px solid #08622e;
    border-right: 0px;
    padding: 5px 10px;
    width: 150px;
    font-size: 12px;
	border-radius: 3px 0px 0px 3px;

 }
 .client-payment-single-input-area {
    margin-top: 35px;
}
.client-payment-single-right-area {
    float: left;
    border-left: 1px solid #000;
    width: 70%;
    text-align: center;
}
.icon-area-ofpyament.overflow-fix {
    font-size: 25px;
    float: left;
    width: 30%;
    text-align: center;
	    color: #495057;
}
.client-payment-single-input-area li p {
        font-size: 14px;
    border-bottom: 1px solid #0000000f;
    padding: 10px 15px;
    background-image: linear-gradient(rgba(29, 33, 41, .04), rgba(29, 33, 41, .04));
    border-radius: 2px;
}

.client-payment-single-input-area-new.overflow-fix {
    box-shadow: 0px 0px 5px 0px #0000002e;
    padding: 50px;
    text-align: center;
}
</style>
@endsection
