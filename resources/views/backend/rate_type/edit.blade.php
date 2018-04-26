@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Update Rate Type</h3>
				</div>
			</div>
          {!! Form::model( $projecttype, ['route' => ['rate-type.update', $projecttype->id], 'files' => true, 'method' => 'PUT']) !!}
          {{ csrf_field() }}
          <div class="row main">
              <div class="col-xs-12 col-sm-10 col-md-6">
                  <div class="form-group">
                      <label for="project_type" class="cols-sm-2 control-label">Rate Type</label>
                      <div class="cols-sm-10">
                          <input type="text" name="project_type" id="project_type" class="form-control" required="" value="{{ $projecttype->project_type }}" />
                        
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group btn-bot">
              <input type="submit"  value="Update" class="btn btn-success">
              <a href="{{ URL::route('rate-type.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
          </div>
          {!! Form::close() !!}
		</div>
	</div>
@endsection