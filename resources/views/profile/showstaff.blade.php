
@extends('layout.app')
@section('content')
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">View {{$profiles->firstname}}'s Profile</h1>
					</div>
					<!-- /.col-lg-12 -->
			</div>
			{!! Form::open(['action' => 'StaffsController@store', 'method' => 'POST',
				'class' => 'col-lg-12 form', 'style' => 'padding:30px; border-radius:20px;', 'id' => 'addform'])!!}

				<div class="form-group col-lg-4">
					<label class="control-label" for="fname">First Name</label>
					{{Form::text('fname', $profiles->firstname, ['class' => 'form-control', 'disabled','placeholder' => 'First Name'])}}

				</div>
				<div class="form-group col-lg-4">
					<label class="control-label" for="mname">Middle Name</label>
					{{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'disabled','placeholder' => 'Middle Name'])}}
				</div>

				<div class="form-group col-lg-4">
					<label class="control-label" for="lname">Last Name</label>
					{{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'disabled','placeholder' => 'Last Name'])}}
				</div>
				<br>
				<div class="form-group col-lg-6">
					<label class="control-label" for="contactdetails">Contact Details</label>
					{{Form::text('contactdetails', $profiles->contactdetails, ['class' => 'form-control', 'disabled','placeholder' => 'Contact Details'])}}
				</div>
				<div class="form-group col-lg-6">
					<label class="control-label" for="email">Email Address</label>
					{{Form::email('email', $profiles->email, ['class' => 'form-control', 'disabled','placeholder' => 'Email Address'])}}
				</div>
				<br>
				<div class="form-group col-lg-12">
					<label class="control-label" for="staff_pos">Staff Position</label>
					{{Form::text('staff_pos', $profiles->staff->staff_pos, ['class' => 'form-control', 'disabled','placeholder' => 'Staff Position'])}}
				</div>

				<div class="form-group col-lg-12">
					<label>Cluster</label>
					{{Form::select('cluster', ['Administrator' => 'Administrator' ,
																		 'Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
            $profiles->staff->cluster, ['class'=>'form-control','disabled','placeholder' => 'Choose Cluster'])}}
				</div>

       {!!Form::open(['action'=> ['StaffsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        <a href="/staffs/{{$profiles->profile_id}}/edit" class="btn btn-default">Edit</a>
        {{Form::submit('Delete',['class' => 'btn btn-default' ])}}
       {!!Form::close()!!}
@endsection
