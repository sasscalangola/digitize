@extends('app')

@section('content')

<div class="row">
    <h1 class="col-sm-6">Create New Project</h1>
</div>
<div class="alert alert-info col-sm-12">
    To Create a Project you will need:<br>
    <ol>
        <li> Project Basic Info and description</li>
        <li> Project Area Shapefile in WGS84</li>
        <li> After Confirmation, the digitizing grids will be created and the project will be ready to start</li>
        <li> If you are creating a Private project, you will have to attach the users you allow to digitize</li>

    </ol>
</div>
<div class="row">
<h2 class="col-sm-6">Part 1 - Project Basic Info</h2>
</div>
{!! Form::open(array('url'=>'/manage/store_new_project','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}

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

    <div class="form-group{{ $errors->has('project_shapefile') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">
            <span class="glyphicon glyphicon-folder-open" style="color:#00b3ee"></span>
            Upload Project Shapefile
        </label>
        <div class="col-md-6">
            <input type="file" accept=".shp, .dbf, .prj" name="project_shapefile" multiple/>
            @if ($errors->has('project_nature'))
                <span class="help-block">
                        <strong>{{ $errors->first('project_nature') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <button type="submit" class="btn col-lg-3 col-lg-offset-1 btn-success btn-lg">
        <span class="glyphicon glyphicon-ok"></span> Go to Part 2
    </button>

</form>

@endsection