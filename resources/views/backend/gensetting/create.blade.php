@extends('layouts.admin')

@section('content')
  <div class="col-md-6 col-md-offset-1 p-top">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h3>General Setting</h3>
        </div>
      </div>
        <form action="{{ route('gsetting.store') }}" method="POST" enctype="multipart/form-data" files="true">
          {{ csrf_field() }}
            <div class="row main">
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('app_name') ? ' has-error' : '' }}">
                        <label for="app_name" class="cols-sm-2 control-label">Application Name </label>
                        <div class="cols-sm-10">
                            <input type="text" name="app_name" id="app_name" class="form-control"  placeholder="Application Name..." required=""/>
                          <small class="text-danger">{{ $errors->first('app_name') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('copy') ? ' has-error' : '' }}">
                        <label for="copy" class="cols-sm-2 control-label">Copy Right</label>
                        <div class="cols-sm-10">
                            <input type="text" name="copy" id="copy" class="form-control"  placeholder="Copy Right ..." required=""/>
                          <small class="text-danger">{{ $errors->first('copy') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="cols-sm-2 control-label">Year</label>
                        <div class="cols-sm-10">
                            <input type="text" name="year" id="year" class="form-control"  placeholder="Year ..." required=""/>
                          <small class="text-danger">{{ $errors->first('year') }}</small>
                         </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo" class="cols-sm-2 control-label">Logo</label>
                        <div class="cols-sm-10">
                            <input type="file" name="logo" id="logo" class="form-control"  placeholder="Logo ..." required=""/>
                          <small class="text-danger">{{ $errors->first('logo') }}</small>
                         </div>
                    </div>
                </div>
            </div>
            <div class="form-group btn-bot">
              <input type="submit"  value="Submit" class="btn btn-success">
              <a href="{{ URL::route('gsetting.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
            </div>
        </form>
    </div>
  </div>
@endsection