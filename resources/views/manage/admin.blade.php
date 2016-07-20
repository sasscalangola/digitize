@extends('app')

@section('content')

    @include('nav_admin')

    <div id="projects" class="container-fluid text-center">
        <h2>Select Project</h2>

        <div class="form-group">
            {!! Form::label('projects','Projects:') !!}
            {!! Form::select('projects', array_pluck($projects_user_manage, 'name', 'id'),null,['class'=>'form-control','id'=>'projects_select']) !!}
        </div>
        <button type="submit" class="btn col-lg-3  btn-success btn-lg" onclick="change_project()">
         <span class="glyphicon glyphicon-ok"></span> Change
        </button>

    </div>
    <script language="javascript" type="text/javascript">
        function change_project()
        {
            var new_proj=$('#projects_select option:selected').val();
            $(window).attr('location', '/manage/admin/'+new_proj);
        }
    </script>
@endsection