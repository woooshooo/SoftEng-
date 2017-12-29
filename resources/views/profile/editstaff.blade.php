@extends('layout.app')
@section('content')
		<div class="container">
			<h4>Edit Staff Profile</h4>
			{!! Form::open(['action' => ['StaffsController@update',$profiles->profile_id], 'method' => 'POST',
				'class' => 'form grey darken-1 z-depth-5', 'style' => 'padding:30px; border-radius:20px;'])!!}

				<div class="input-field col s3">
					{{Form::text('fname', $profiles->firstname, ['class' => 'validate'])}}
					{{Form::label('fname', 'First Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('mname', $profiles->middlename, ['class' => 'validate'])}}
					{{Form::label('mname', 'Middle Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('lname', $profiles->lastname, ['class' => 'validate'])}}
					{{Form::label('lname', 'Last Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('contactdetails', $profiles->contactdetails, ['class' => 'validate'])}}
					{{Form::label('contactdetails', 'Contact Details')}}
				</div>
				<div class="input-field col s3">
					{{Form::email('email', $profiles->email, ['class' => 'validate'])}}
					{{Form::label('email', 'Email Address')}}
				</div>
        <div class="input-field col s3">
					{{Form::text('staff_pos', $staffs->staff_pos, ['class' => 'validate'])}}
					{{Form::label('staff_pos', 'Staff Position')}}
				</div>
				<div class="input-field col s3 m3 l3">
					{{Form::select('cluster', ['Administrator' => 'Administrator',
																		 'Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
           $staffs->cluster, ['class'=>'input-field col s3 m3 l3 disabled hidden','placeholder' => 'Cluster'])}}
				</div>
        {{Form::hidden('_method','PUT')}}
				{{Form::submit('Submit', ['class' => 'btn btn-small black waves-effect waves-light z-depth-5'])}}
				{{Form::reset('Reset', ['class' => 'btn btn-small black waves-effect waves-light z-depth-5'])}}
		{!! Form::close() !!}
		</div>

@endsection
