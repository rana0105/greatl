@extends('layouts.main')
@section('content')
<section class="message-box-area overflow-fix content-bg">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="message-box box-white-bg overflow-fix">
					<h3 class="text-center title">{{ $project->p_title }}</h3>
					<table class="table table-striped tabel-responsive" style="margin-top: 2%">
						@if(sizeof($clientPayHistory) > 0)
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Date</th>
								<th>Payment ID</th>
								<th>Payer ID</th>
								<th>Payment Method</th>
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
									<td>{{ $history->PayerID }}</td>
								</tr>
							@endforeach
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
	.pay-edit a {
	    background: #0d9b49;
	    padding: 8px 15px;
	    display: block;
	    width: 100px;
	    margin-top: 15px;
	    margin-right: 15px;
	    margin-left: 42%;
	    box-shadow: 0px 0px 5px 0px #0000002e;
	    color: #ecf0f1;
	    text-align: center;
	}
	h3.text-center.title {
		margin-top: 2%;
		font-weight: 400;
		font-family: monospace;
		font-size: 20px;
		color: #0d9b49;
	}
</style>
@endsection