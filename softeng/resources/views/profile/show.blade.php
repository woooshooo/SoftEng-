@extends('layout.app')
@section('content')
  <div class="container col s12 m6" style="height:100px">
    <h4>Volunteers Profile</h4>
    <br>
    <div class="card-panel blue accent-3 col s9">
       <p class="flow-text">Fullname:{{$profiles->firstname}} {{$profiles->middlename}} {{$profiles->lastname}}</p>
       <p class="flow-text">Email: {{$profiles->email}}</p>
       <p class="flow-text">Contact Details: {{$profiles->contactdetails}}</p>
       <p class="flow-text">Course: {{$profiles->volunteer->course}}</p>
       <p class="flow-text">Cluster: {{$profiles->volunteer->cluster}}</p>
       <p class="flow-text">Year Level: {{$profiles->volunteer->yearlvl}}</p>
       <p class="flow-text">Course: {{$profiles->volunteer->course}}</p>
       <p class="flow-text">Section: {{$profiles->volunteer->section}}</p>
       <p class="flow-text"><a href="/vols/{{$profiles->profile_id}}/edit" class="btn btn-small pink accent-1  z-depth-2"><b>Edit</b></a></p>
       {!!Form::open(['action'=> ['VolsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-small red darken-1  z-depth-2' ])}}
       {!!Form::close()!!}
   </div>

    <br>
  </div>
</div>
@endsection
