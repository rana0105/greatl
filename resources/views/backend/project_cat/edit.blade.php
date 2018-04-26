@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Update Rate Type</h3>
				</div>
			</div>
          {!! Form::model( $projectcat, ['route' => ['project-category.update', $projectcat->id], 'files' => true, 'method' => 'PUT']) !!}
          {{ csrf_field() }}
          <div class="row main">
              <div class="col-xs-12 col-sm-10 col-md-6">
                  <div class="form-group">
                      <label for="project_cat" class="cols-sm-2 control-label">Rate Type</label>
                      <div class="cols-sm-10">
                          <input type="text" name="project_cat" id="project_cat" class="form-control" required="" value="{{ $projectcat->project_cat }}" />
                        
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group btn-bot">
              <input type="submit"  value="Update" class="btn btn-success">
              <a href="{{ URL::route('project-category.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
          </div>
          {!! Form::close() !!}
		</div>
	</div>
@endsection