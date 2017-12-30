@extends('layout.app')
@section('content')
			<div class="container">
				<h4>Student Volunteers</h4>

				<table class="centered bordered responsive-table highlight grey darken-1 z-depth-5" style="margin:2px; border-radius:10px;">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Course</th>
  						<th>Year Level</th>
  						<th>Cluster</th>
              <th></th>
            </tr>
        </thead>
          @foreach ($vols as $value)
              <tr class="clickable-row" data-href="/vols/{{$value->profile_id}}">
      						<td>{{$value->profile->firstname}} {{$value->profile->lastname}}</td>
      						<td>{{$value->course}}</td>
      						<td>{{$value->yearlvl}}</td>
      						<td>{{$value->cluster}}</td>
                  <td><a href="/vols/{{$value->profile_id}}/edit" class="btn btn-small grey darken-1  z-depth-2">Edit</a></td>
    					</tr>
          @endforeach


				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('staffs')}}">View Staff</a>
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('addvolunteer')}}">Add Volunteer</a>
				</div>
			</div>
	</div>
@endsection
