@extends('layout.app')
@section('content')
		<div class="container">
			<h4>Edit Volunteer Profile</h4>
			{!! Form::open(['action' => ['VolsController@update',$profiles->profile_id], 'method' => 'POST',
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
					{{Form::text('coursestrand', $vols->course, ['class' => 'validate'])}}
					{{Form::label('coursestrand', 'Course or Strand')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('section', $vols->section, ['class' => 'validate'])}}
					{{Form::label('section', 'Section')}}
				</div>
				<div class="input-field col s3 m3 l3">
					{{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
						 												 'Grade 12' => 'Grade 12',
						 												 '1st Year' => '1st Year',
						 												 '2nd Year' => '2nd Year',
						 												 '3rd Year' => '3rd Year',
						 												 '4th Year' => '4th Year',
						 												 '5th Year' => '5th Year'],$vols->yearlvl,
                                     ['class'=>'input-field col s3 m3 l3','placeholder' => 'Year Level or Grade'])}}
				</div>

				<div class="input-field col s3 m3 l3">
					{{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
           $vols->cluster, ['class'=>'input-field col s3 m3 l3','placeholder' => 'Cluster'])}}
				</div>
        {{Form::hidden('_method','PUT')}}
				{{Form::submit('Submit', ['class' => 'btn btn-small black waves-effect waves-light z-depth-5'])}}
				{{Form::reset('Reset', ['class' => 'btn btn-small black waves-effect waves-light z-depth-5'])}}
		{!! Form::close() !!}
		</div>

@endsection
