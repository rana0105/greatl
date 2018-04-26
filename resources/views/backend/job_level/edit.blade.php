@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Update Job Level</h3>
				</div>
			</div>
          {!! Form::model( $joblevel, ['route' => ['job-level.update', $joblevel->id], 'files' => true, 'method' => 'PUT']) !!}
          {{ csrf_field() }}
          <div class="row main">
              <div class="col-xs-12 col-sm-10 col-md-6">
                  <div class="form-group">
                      <label for="job_level" class="cols-sm-2 control-label">Job Level</label>
                      <div class="cols-sm-10">
                          <input type="text" name="job_level" id="job_level" class="form-control" required="" value="{{ $joblevel->job_level }}" />
                        
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group btn-bot">
              <input type="submit"  value="Update" class="btn btn-success">
              <a href="{{ URL::route('job-level.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
          </div>
          {!! Form::close() !!}
		</div>
	</div>
@endsection