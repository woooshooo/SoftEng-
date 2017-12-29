@extends('layout.app')
@section('content')
			<div class="container">
				<h4>Viewing Staff Profiles</h4>

				<table class="centered bordered responsive-table highlight grey darken-1 z-depth-5" style="margin:2px; border-radius:10px;">
          <thead>
            <tr>
  						<th>Name</th>
  						<th>Cluster</th>
  						<th>Position</th>
              <th></th>
            </tr>
        </thead>
          @foreach ($staffs as $value)
              <tr>
      						<td>
                    <a href="/staffs/{{$value->profile_id}}">
                      {{$value->profile->firstname}} {{$value->profile->lastname}}
                    </a>
                  </td>
      						<td>{{$value->cluster}}</td>
      						<td>{{$value->staff_pos}}</td>
                  <td><a href="/staffs/{{$value->profile_id}}/edit" class="btn btn-small grey darken-1  z-depth-2">Edit</a></td>
    					</tr>
          @endforeach


				</table>
				<br>
				<div class="navbutton">
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('vols')}}">View Volunteers</a>
					<a class="btn btn-small black waves-effect waves-light z-depth-5" href="{{url('addstaff')}}">Add Staff</a>
				</div>
			</div>
	</div>
@endsection
