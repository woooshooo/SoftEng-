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
              {{-- <th></th> --}}
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
    					</tr>
          @endforeach
					<!-- Button trigger modal -->


				</table>
				<br>
				<div class="navbutton noprint">
					<a class="btn btn-default btn-lg btn-inline" href="{{url('staffs')}}">View Staff</a>
					<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#addvolunteer">Add Volunteer</button>
					<button type="button" class="btn btn-default btn-lg btn-inline"  onclick="window.print();return false;" >Print Page</button>
				</div>
			</div>
@endsection
<!-- Modal for Addvolunteer -->
<div class="modal fade" id="addvolunteer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add Volunteer</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => 'VolsController@store', 'method' => 'POST',
						'class' => 'form z-depth-5', 'style' => 'padding:30px; border-radius:20px;', 'id' => 'addform'])!!}

						<div class="form-group col-lg-4">
							{{Form::label('fname', 'First Name')}}
							{{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}

						</div>
						<div class="form-group col-lg-4">
							{{Form::label('mname', 'Middle Name')}}
							{{Form::text('mname', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}

						</div>
						<div class="form-group col-lg-4">
							{{Form::label('lname', 'Last Name')}}
							{{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}

						</div>
						<div class="form-group col-lg-6">
							{{Form::label('contactdetails', 'Contact Details')}}
							{{Form::text('contactdetails', '',  ['class' => 'form-control', 'placeholder' => 'Contact Details'])}}

						</div>
						<div class="form-group col-lg-6">
							{{Form::label('email', 'Email Address')}}
							{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
						</div>
						<div class="form-group col-lg-6">
							{{Form::label('coursestrand', 'Course or Strand')}}
							{{Form::text('coursestrand', '', ['class' => 'form-control', 'placeholder' => 'Course or Strand'])}}

						</div>
						<div class="form-group col-lg-6">
							{{Form::label('section', 'Section')}}
							{{Form::text('section', '', ['class' => 'form-control', 'placeholder' => 'Section'])}}

						</div>

						<div class="form-group col-lg-12">
							<label>Year Level</label>
							{{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
								 												 'Grade 12' => 'Grade 12',
								 												 '1st Year' => '1st Year',
								 												 '2nd Year' => '2nd Year',
								 												 '3rd Year' => '3rd Year',
								 												 '4th Year' => '4th Year',
								 												 '5th Year' => '5th Year'],
		           null, ['class'=>'form-control','placeholder' => 'Year Level or Grade'])}}
						</div>

						<div class="form-group col-lg-12">
							<label>Cluster</label>
							{{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
								 												 'Creative Cluster' => 'Creative Cluster',
								 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
		           null, ['class'=>'form-control','placeholder' => 'Cluster'])}}
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
