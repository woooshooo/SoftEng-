@extends('layout.app')
@section('content')
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Edit Volunteer Profile</h1>
				</div>
		</div>
			{!! Form::open(['action' => ['VolsController@update',$profiles->profile_id],  'method' => 'POST',
				'class' => 'form'])!!}

				<div class="form-group col-lg-4">
					{{Form::label('fname', 'First Name')}}
					{{Form::text('fname', $profiles->firstname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}

				</div>
				<div class="form-group col-lg-4">
					{{Form::label('mname', 'Middle Name')}}
					{{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}

				</div>
				<div class="form-group col-lg-4">
					{{Form::label('lname', 'Last Name')}}
					{{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}

				</div>
				<div class="form-group col-lg-6">
					{{Form::label('contactdetails', 'Contact Details')}}
					{{Form::text('contactdetails', $profiles->contactdetails,  ['class' => 'form-control', 'placeholder' => 'Contact Details'])}}

				</div>
				<div class="form-group col-lg-6">
					{{Form::label('email', 'Email Address')}}
					{{Form::email('email', $profiles->email, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
				</div>
				<div class="form-group col-lg-6">
					{{Form::label('coursestrand', 'Course or Strand')}}
					{{Form::text('coursestrand', $vols->course, ['class' => 'form-control', 'placeholder' => 'Course or Strand'])}}

				</div>
				<div class="form-group col-lg-6">
					{{Form::label('section', 'Section')}}
					{{Form::text('section', $vols->section, ['class' => 'form-control', 'placeholder' => 'Section'])}}

				</div>

				<div class="form-group col-lg-6">
					<label>Year Level</label>
					{{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
						 												 'Grade 12' => 'Grade 12',
						 												 '1st Year' => '1st Year',
						 												 '2nd Year' => '2nd Year',
						 												 '3rd Year' => '3rd Year',
						 												 '4th Year' => '4th Year',
						 												 '5th Year' => '5th Year'],
           $vols->yearlvl, ['class'=>'form-control','placeholder' => 'Year Level or Grade'])}}
				</div>
				<div class="form-group col-lg-6">
          {{Form::label('vol_status', 'Status')}}
          {{Form::text('vol_status', $profiles->volunteer->vol_status, ['class' => 'form-control','disabled'])}}

        </div>

				<div class="form-group col-lg-12">
					<label>Cluster</label>
					{{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
           $vols->cluster, ['class'=>'form-control','placeholder' => 'Cluster'])}}
				</div>
		{{Form::hidden('_method','PUT')}}
				{{Form::submit('Submit', ['class' => 'btn btn-default'])}}
				{{Form::reset('Reset', ['class' => 'btn btn-default'])}}
		{!! Form::close() !!}

@endsection
