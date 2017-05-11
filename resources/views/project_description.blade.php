

    <div class="container-fluid text-center digitize">

        <div class="col-lg-12"><h2 class="inverse">Current Project: {{$project->name}}</h2></div>
        <div id="map-project" class="col-sm-8 map" ></div>

        <div class="col-lg-4"><h4 class="inverse">Area: {{$project->area}} sqkm</h4></div>
        <div class="col-lg-4"><h4 class="inverse">Nature: {{$project->nature}}</h4></div>
        <div class="col-lg-4"><p class="inverse" style="padding: 20px; text-align: justify">{{$project->description}} </p> </div>

        <div class="col-sm-12" id="mouse-position-project"></div>

    </div>
    <script>
        var project_id = "{{$project->id}}";
    </script>
    <script src="{{ asset('/js/map_project.js') }}"></script>


