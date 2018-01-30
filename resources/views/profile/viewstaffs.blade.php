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
				<div class="navbutton noprint">
					<a class="btn btn-default btn-lg btn-inline" href="{{url('vols')}}">View Volunteers</a>
					<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#addStaff">Add Staff</button>
				</div>
			</div>
@endsection

<!-- Modal for Add Staff -->
<div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Add Staff</h3>

      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => 'StaffsController@store', 'method' => 'POST',
						'class' => 'col-lg-12 form', 'style' => 'padding:30px; border-radius:20px;', 'id' => 'addform'])!!}

						<div class="form-group col-lg-4">
							<label class="control-label" for="fname">First Name</label>
							{{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}

						</div>
						<div class="form-group col-lg-4">
							<label class="control-label" for="mname">Middle Name</label>
							{{Form::text('mname', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
						</div>

						<div class="form-group col-lg-4">
							<label class="control-label" for="lname">Last Name</label>
							{{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
						</div>
						<br>
						<div class="form-group col-lg-6">
							<label class="control-label" for="contactdetails">Contact Details</label>
							{{Form::text('contactdetails', '', ['class' => 'form-control', 'placeholder' => 'Contact Details'])}}
						</div>
						<div class="form-group col-lg-6">
							<label class="control-label" for="email">Email Address</label>
							{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
						</div>
						<br>
						<div class="form-group col-lg-12">
							<label class="control-label" for="staff_pos">Staff Position</label>
							{{Form::text('staff_pos', '', ['class' => 'form-control', 'placeholder' => 'Staff Position'])}}
						</div>

						<div class="form-group col-lg-12">
							<label>Cluster</label>
							{{Form::select('cluster', ['Administrator' => 'Administrator' ,
																				 'Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
								 												 'Creative Cluster' => 'Creative Cluster',
								 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
		           null, ['class'=>'form-control','placeholder' => 'Choose Cluster'])}}
						</div>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
