@extends('layout.app')
@section('content')

			<div class="panel-body">
				<div class="panel-heading">
					<h1>Student Volunteers</h1>
				</div>
				<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Course</th>
  						<th>Year Level</th>
  						<th>Cluster</th>
							<th>Status</th>
              <th></th>
            </tr>
        </thead>
          @foreach ($vols as $value)
              <tr class="clickable-row" data-href="/vols/{{$value->profile_id}}">
      						<td>{{$value->profile->firstname}} {{$value->profile->lastname}}</td>
      						<td>{{$value->course}}</td>
      						<td>{{$value->yearlvl}}</td>
      						<td>{{$value->cluster}}</td>
									<td>{{$value->vol_status}}</td>
                  <td><a href="/vols/{{$value->profile_id}}/edit" class="btn btn-default btn-block">Edit</a></td>
    					</tr>
          @endforeach


				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-default btn-lg btn-inline" href="{{url('staffs')}}">View Staff</a>
					<a class="btn btn-default btn-lg btn-inline" href="{{url('addvolunteer')}}">Add Volunteer</a>
				</div>
			</div>
@endsection
