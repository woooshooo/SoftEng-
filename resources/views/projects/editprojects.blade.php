@extends('layout.app')
@section('content')
  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Project</h1>
        </div>
    </div>
        {!! Form::open(['action' => ['ProjectsController@update', $projects->projects_id],  'method' => 'POST', 'class' => 'form'])!!}

        some shit over here
        {!! Form::close() !!}
    </div>
@endsection
