@extends('app')

@section('content')

    @include('nav_admin')

    <div id="permissions" class="container-fluid text-center">
        <h2>Users Permissions</h2>
        <h3>For Project {{$current_project->name}}</h3>

        <table class="table table-hover col-sm-12" style="text-align: left">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Attach/Detach from Project</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)

                <tr id='{{$user->id}}' onclick="selectRow({{$user->id}})">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->projects()->find($current_project->id))
                        <td>
                            {{$levels->find($user->projects()->find($current_project->id)->pivot->level_id)->description}}
                        </td>
                        <td><button  class="detach_user" id="{{$user->id}}">  <span class="glyphicon glyphicon-minus" style="color: red"></span></button></td>
                    @else
                        <td>-</td>
                        <td><button class="attach_user" id="{{$user->id}}">  <span class="glyphicon glyphicon-plus" style="color: green"></span></button></td>
                    @endif

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

    <script>
        $('.detach_user').click(function(e){
            e.preventDefault();
            var user_id=$(this).attr('id');

            if ({{Auth::user()->id}} == user_id ){
                alert("You can not remove yourself from the project. Please contact the Administrator");
             }
            else{
                var url = "/manage/users/permissions/detach_user_project/";

                var data = "user_id="+user_id+"&project_id="+"{{$current_project->id}}"+"&_token="+"{{ Session::token() }}";
                $.post(url, data, function(result){
                    alert(result);
                    location.reload(true);
                }).fail(function(){
                    alert("Error when updating");
                });

            }
        });

        $('.attach_user').click(function(e){

            e.preventDefault();
            var user_id=$(this).attr('id');

            var url = "/manage/users/permissions/attach_user_project/";
            var data = "user_id="+user_id+"&project_id="+"{{$current_project->id}}"+"&_token="+"{{ Session::token() }}";
            $.post(url, data, function(result){
                alert(result);
                location.reload(true);
            }).fail(function(){
                alert("Error when updating");
            });



        });

        function selectRow(id){

            $('[class="success"]').attr("class","");
            $("#"+id).attr("class","success");
        };
    </script>
@endsection