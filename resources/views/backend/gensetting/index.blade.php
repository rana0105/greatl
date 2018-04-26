@extends('layouts.admin')

@section('content')
	<div class="col-md-8 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-title">
					<h3>Setting</h3>
			</div>
			{{-- <header class="panel-heading">
					<a href="{{ URL::route('gsetting.create') }}" class="btn btn-main-inv">Create Setting</a>
			</header> --}}
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
					<thead>
						<th>Sr.</th>
						<th>Name</th>
						<th>Copy Right</th>
						<th>Year</th>
						<th>Logo</th>
						<th class="text-align-center">Action</th>
					</thead>

					<tbody>
					<?php $sr = 1; ?>
						@foreach($gsetting as $gen)
							<tr>
							    <td>{{ $sr++ }}</td>
								<td>{{ $gen->app_name }}</td>
								<td>{{ $gen->copy }}</td>
								<td>{{ $gen->year }}</td>
								<td>
								<img src="{{asset('app_images/resize_images/')}}/{{ $gen->logo }}" alt="" height="50" width="45" class="img-thumbnail">
								</td>
								<td>
									<a href="{{ URL::route('gsetting.edit', $gen->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>
								{{-- @can('delete_procategories') --}}
								{!! Form::open(['route' => ['gsetting.destroy', $gen->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
								
								{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
								{!! Form::close() !!}
								{{-- @endcan --}}
								</td>
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection