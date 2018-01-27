@extends('layout.app')
@section('content')
			<div class="panel-body">
				<div class="panel-heading">
					<h1>Viewing Staff Profiles</h1>
				</div>
				<table width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-example">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Cluster</th>
  						<th>Position</th>
              <th>Status</th>
              {{-- <th></th> --}}
            </tr>
        </thead>
          @foreach ($staffs as $value)
              <tr class="clickable-row" data-href="/staffs/{{$value->profile_id}}">
      						<td>{{$value->profile->firstname}} {{$value->profile->lastname}}</td>
      						<td>{{$value->cluster}}</td>
      						<td>{{$value->staff_pos}}</td>
									@if ($value->staff_status == "ACTIVE")
										<td><font color="green">{{$value->staff_status}}</font></td>
										@else
										<td><font color="red">{{$value->staff_status}}</font></td>
									@endif
                  {{-- <td><a href="/staffs/{{$value->profile_id}}/edit" class="btn btn-default btn-lg btn-block">Edit</a></td> --}}
    					</tr>
          @endforeach


				</table>
				<br>
				<div class="navbutton">
						<a class="btn btn-default btn-lg btn-inline" href="{{url('vols')}}">View Volunteers</a>
					<a class="btn btn-default btn-lg btn-inline" href="{{url('addstaff')}}">Add Staff</a>
				</div>
			</div>
@endsection
