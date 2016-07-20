@extends('app')

@section('content')

<h1>Project Management</h1>

<h2>Create Project Form</h2>
<form class="form-horizontal" role="form" action="/manage/init_project" method="POST">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Project Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="project_name" value="{{ old('project_name') }}">

            @if ($errors->has('project_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('project_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('project_desc') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Project Description</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="project_desc" value="{{ old('project_desc') }}">

            @if ($errors->has('project_desc'))
                <span class="help-block">
                    <strong>{{ $errors->first('project_desc') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('project_nature') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Project Nature</label>
        <div class="col-md-6">
            {{ Form::select('project_nature', ['Private', 'Public']) }}

            @if ($errors->has('project_nature'))
                <span class="help-block">
                    <strong>{{ $errors->first('project_nature') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <button type="submit" class="btn col-lg-3 col-lg-offset-1 btn-success btn-lg">
        <span class="glyphicon glyphicon-ok"></span> Create Project
    </button>

</form>

@endsection