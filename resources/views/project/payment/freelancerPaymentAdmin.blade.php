@extends('layouts.admin')
@section('content')
	<div class="col-md-10 col-md-offset-0 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Payment history by Admin</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Date</th>
							<th>Client</th>
							<th>Project</th>
							<th>Client Pay</th>
							<th>Freelancer</th>
							<th>Payment</th>
						</tr>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						@foreach($paymentFreelancer as $payment)
							<tr>
								<td>{{ $sr++ }}</td>
								<td>{{ date('d-M-Y', strtotime($payment->payment_create)) }}</td>
								<td>{{ $payment->client->name }}</td>
								<td>{{ $payment->project->p_title }}</td>
								<td>{{ $payment->client_pay }}</td>
								<td>{{ $payment->freelancer->name }}</td>
								<td>$ {{ $payment->freelancer_payment }}</td>
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection