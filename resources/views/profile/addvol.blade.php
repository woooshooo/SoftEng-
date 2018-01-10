@extends('layout.app')
@section('content')
		<div class="container">
			<h4>Add Volunteer Profile</h4>
			{!! Form::open(['action' => 'VolsController@store', 'method' => 'POST',
				'class' => 'form z-depth-5', 'style' => 'padding:30px; border-radius:20px;', 'id' => 'addform'])!!}

				<div class="input-field col s3">
					{{Form::text('fname', '', ['class' => 'validate'])}}
					{{Form::label('fname', 'First Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('mname', '', ['class' => 'validate'])}}
					{{Form::label('mname', 'Middle Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('lname', '', ['class' => 'validate'])}}
					{{Form::label('lname', 'Last Name')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('contactdetails', '', ['class' => 'validate'])}}
					{{Form::label('contactdetails', 'Contact Details')}}
				</div>
				<div class="input-field col s3">
					{{Form::email('email', '', ['class' => 'validate'])}}
					{{Form::label('email', 'Email Address')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('coursestrand', '', ['class' => 'validate'])}}
					{{Form::label('coursestrand', 'Course or Strand')}}
				</div>
				<div class="input-field col s3">
					{{Form::text('section', '', ['class' => 'validate'])}}
					{{Form::label('section', 'Section')}}
				</div>
				<div class="input-field col s3 m3 l3">
					{{Form::select('yearlvl', ['Grade 11' => 'Grade 11',
						 												 'Grade 12' => 'Grade 12',
						 												 '1st Year' => '1st Year',
						 												 '2nd Year' => '2nd Year',
						 												 '3rd Year' => '3rd Year',
						 												 '4th Year' => '4th Year',
						 												 '5th Year' => '5th Year'],
           null, ['class'=>'input-field col s3 m3 l3','placeholder' => 'Year Level or Grade'])}}
				</div>

				<div class="input-field col s3 m3 l3">
					{{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
						 												 'Creative Cluster' => 'Creative Cluster',
						 												 'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
           null, ['class'=>'input-field col s3 m3 l3','placeholder' => 'Cluster'])}}
				</div>
				{{Form::submit('Submit', ['class' => 'btn btn-small green lighten-1 waves-effect waves-light z-depth-5'])}}
				{{Form::reset('Reset', ['class' => 'btn btn-small red darken-2 waves-effect waves-light z-depth-5'])}}
		{!! Form::close() !!}
		</div>

@endsection
