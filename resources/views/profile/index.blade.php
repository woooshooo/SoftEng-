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
      						<td>{{$value->profile->lastname}}, {{$value->profile->firstname}}</td>
      						<td>{{$value->course}}</td>
      						<td>{{$value->yearlvl}}</td>
      						<td>{{$value->cluster}}</td>
									@if ($value->vol_status == "ACTIVE")
										<td><font color="green">{{$value->vol_status}}</font></td>
										@else
										<td><font color="red">{{$value->vol_status}}</font></td>
									@endif

                  {{-- <td><a href="/vols/{{$value->profile_id}}/edit" class="btn btn-default btn-block">Edit</a></td> --}}
									<td> <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#exampleModalCenter">
									  Edit
									</button> </td>
    					</tr>
          @endforeach
					<!-- Button trigger modal -->


				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-default btn-lg btn-inline" href="{{url('staffs')}}">View Staff</a>
					<a class="btn btn-default btn-lg btn-inline" href="{{url('addvolunteer')}}">Add Volunteer</a>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>
@endsection
