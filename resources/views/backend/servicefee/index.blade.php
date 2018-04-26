@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Service Fee</h3>
			</div>
			<header class="panel-heading">
					<a href="{{ URL::route('servicefee.create') }}" class="btn btn-main-inv a-font">Create Service Fee</a>
			</header>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
					<thead>
						<th>Sr.</th>
						<th>Amount</th>
						<th class="text-align-center">Action</th>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						@foreach($servicefees as $ser)
							<tr>
								<td>{{ $sr++ }}</td>
								<td>${{ $ser->servicefee }}</td>
								<td>
									<a href="{{ URL::route('servicefee.edit', $ser->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
								{{-- @can('delete_procategories')
								{!! Form::open(['route' => ['procategoies.destroy', $procate->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
								
								{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
								{!! Form::close() !!}
								@endcan --}}
								</td>
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection