@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View {{$profiles->firstname}}'s Profile</h1>
        </div>
    </div>
      {!! Form::open(['action' => 'VolsController@store', 'method' => 'POST',
        'class' => 'form'])!!}

        <div class="form-group col-lg-4">
          {{Form::label('fname', 'First Name')}}
          {{Form::text('fname', $profiles->firstname, ['class' => 'form-control','disabled' ,'placeholder' => 'First Name'])}}

        </div>
        <div class="form-group col-lg-4">
          {{Form::label('mname', 'Middle Name')}}
          {{Form::text('mname', $profiles->middlename, ['class' => 'form-control', 'disabled', 'placeholder' => 'Middle Name'])}}

        </div>
        <div class="form-group col-lg-4">
          {{Form::label('lname', 'Last Name')}}
          {{Form::text('lname', $profiles->lastname, ['class' => 'form-control', 'disabled','placeholder' => 'Last Name'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('contactdetails', 'Contact Details')}}
          {{Form::text('contactdetails', $profiles->contactdetails,  ['class' => 'form-control', 'disabled','placeholder' => 'Contact Details'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('email', 'Email Address')}}
          {{Form::email('email', $profiles->email, ['class' => 'form-control', 'disabled','placeholder' => 'Email Address'])}}
        </div>
        <div class="form-group col-lg-6">
          {{Form::label('coursestrand', 'Course or Strand')}}
          {{Form::text('coursestrand', $profiles->volunteer->course, ['class' => 'form-control','disabled', 'placeholder' => 'Course or Strand'])}}

        </div>
        <div class="form-group col-lg-6">
          {{Form::label('section', 'Section')}}
          {{Form::text('section', $profiles->volunteer->section, ['class' => 'form-control','disabled', 'placeholder' => 'Section'])}}

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
           $profiles->volunteer->yearlvl, ['class'=>'form-control','disabled','placeholder' => 'Year Level or Grade'])}}
        </div>

        <div class="form-group col-lg-12">
          <label>Cluster</label>
          {{Form::select('cluster', ['Broadcast & Productions Cluster' => 'Broadcast & Productions Cluster',
                                     'Creative Cluster' => 'Creative Cluster',
                                     'Editorial & Social Media Cluster' => 'Editorial & Social Media Cluster'],
          $profiles->volunteer->cluster, ['class'=>'form-control','disabled','placeholder' => 'Cluster'])}}
        </div>
       {!!Form::open(['action'=> ['VolsController@destroy', $profiles->profile_id], 'method' => 'POST', 'class' => ''])!!}
        {{Form::hidden('_method','DELETE')}}
        <a href="/vols/{{$profiles->profile_id}}/edit" class="btn btn-default">Edit</a>
        {{Form::submit('Delete',['class' => 'btn btn-default' ])}}
       {!!Form::close()!!}

@endsection
