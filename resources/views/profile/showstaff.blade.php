@extends('layout.app')
@section('content')
  <div class="container col s12 m6" style="height:100px">
    <h4>Staff Profile</h4>
    <br>
    <div class="card-panel grey lighten-1 z-depth-5 col s9" style="height:auto; margin:2px; border-radius:10px;">
       <p class="flow-text">Fullname:{{$profiles->firstname}} {{$profiles->middlename}} {{$profiles->lastname}}</p>
       <p class="flow-text">Email: {{$profiles->email}}</p>
       <p class="flow-text">Contact Details: {{$profiles->contactdetails}}</p>
       <p class="flow-text">Cluster: {{$profiles->staff->cluster}}</p>
       <p class="flow-text">Position: {{$profiles->staff->staff_pos}}</p>
       <p class="flow-text"><a href="/staffs/{{$profiles->profile_id}}/edit" class="btn btn-small grey darken-1  z-depth-2">Edit</a></p>
       {!!Form::open(['action'=> ['StaffsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-small grey darken-1  z-depth-2' ])}}
       {!!Form::close()!!}
   </div>

    <br>
  </div>
</div>
@endsection
