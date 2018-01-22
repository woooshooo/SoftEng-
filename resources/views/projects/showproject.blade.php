@extends('layout.app')
@section('content')
  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Showing Project</h1>
        </div>
    </div>
    <div class="form-group col-lg-12">
      <button class="btn btn-default"onclick="history.go(-1);">Back </button>
    </div>
        {!! Form::open(['action' => ['ProjectsController@update', $projects->projects_id],  'method' => 'POST', 'class' => 'form'])!!}

        some shit over here
        {!! Form::close() !!}
    </div>
@endsection
