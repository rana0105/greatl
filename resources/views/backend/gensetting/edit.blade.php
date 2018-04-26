@extends('layouts.admin')

@section('content')
	<div class="col-md-6 col-md-offset-1 p-top">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title">
					<h3>Update General Setting</h3>
				</div>
			</div>
          {!! Form::model( $genset, ['route' => ['gsetting.update', $genset->id], 'files' => true, 'method' => 'PUT']) !!}
          {{ csrf_field() }}
          <div class="row main">
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('app_name') ? ' has-error' : '' }}">
                        <label for="app_name" class="cols-sm-2 control-label">Application Name </label>
                        <div class="cols-sm-10">
                            <input type="text" name="app_name" id="app_name" class="form-control"  value="{{ $genset->app_name }}">
                          <small class="text-danger">{{ $errors->first('app_name') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('copy') ? ' has-error' : '' }}">
                        <label for="copy" class="cols-sm-2 control-label">Copy Right</label>
                        <div class="cols-sm-10">
                            <input type="text" name="copy" id="copy" class="form-control"  value="{{ $genset->copy }}"/>
                          <small class="text-danger">{{ $errors->first('copy') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="cols-sm-2 control-label">Year</label>
                        <div class="cols-sm-10">
                            <input type="text" name="year" id="year" class="form-control"  value="{{ $genset->year }}"/>
                          <small class="text-danger">{{ $errors->first('year') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo" class="cols-sm-2 control-label">Logo</label>
                        <div class="cols-sm-10">
                            <input type="file" name="logo" id="logo" class="form-control"/>
                            <img src="{{asset('app_images/resize_images/')}}/{{ $genset->logo }}" alt="" height="50" width="50" class="img-thumbnail" style ="margin-top:7px" style="float:right">
                          <small class="text-danger">{{ $errors->first('logo') }}</small>
                         </div>
                    </div>
                </div>
            </div>
          <div class="form-group btn-bot">
              <input type="submit"  value="Update" class="btn btn-success">
              <a href="{{ url('gsetting') }}" class="btn btn-warning btn-responsive">Cancel</a>
          </div>
          {!! Form::close() !!}
		</div>
	</div>
@endsection