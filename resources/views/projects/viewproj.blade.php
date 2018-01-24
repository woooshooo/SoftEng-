@extends('layout.app')
@section('content')
<div class="row">
	<div class="panel-body">
			<div class="col-lg-12">
				<h1 class="page-header">{{$projects->projects_name}}</h1>
			</div>

			<div class="col-lg-12">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50">
				</div>
			</div>
			<div class="form-group col-lg-12">
				<button class="btn btn-default"onclick="history.go(-1);">Back </button>
			</div>
			{!! Form::open(['action'] => ['ProjectsController@update', $projects->projects_id], 'method' => 'POST', 'class', 'form'])!!}
			<div class="form-group col-lg-6">
				{{Form::label('projects_details', 'Project Details')}}
				{{Form::text('project_details', $projects->projects_details, ['class' => 'form-control', 'disabled', 'placeholder' => 'Project Details'])}}
			</div>
			{!!Form::close()!!}

</div>
</div>
@endsection