@extends('layout.app')
@section('content')
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Add Volunteer Profile</h1>
				</div>
				<!-- /.col-lg-12 -->
		</div>
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
				{{Form::submit('Submit', ['class' => 'btn btn-default'])}}
				{{Form::reset('Reset', ['class' => 'btn btn-default'])}}
		{!! Form::close() !!}

@endsection
