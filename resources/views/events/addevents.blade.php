@extends('layout.app')
@section('content')
	<div id="wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Add Events</h1>
				</div>
		</div>
		{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST',
			'class' => 'panel-body col-lg-12 form'])!!}

						<div class="form-group col-lg-6">
							<label for="project_name">Event Title</label>
							<input type="text" class="form-control" id="project_name">
						</div>

						<div class="form-group col-lg-6">
							<label for="client_name">Client Name</label>
							<input type="text" class="form-control" id="client_name" name="client_name">
						</div>


						<div class="form-group col-lg-6">
							<label for="cluster_name">Choose Cluster/s assigned</label>
								<select id="cluster_name"class="form-control" multiple>
									<option class="black-text" value="bpc">Broadcast & Productions Cluster</option>
									<option class="black-text" value="cc">Creative Cluster</option>
									<option class="black-text" value="esmc">Editorial & Social Media Cluster</option>
								</select>
						</div>


						<div class="form-group col-lg-12">
							<label for="project_details">Event Details</label>
							<textarea class="form-control" id="project_details" name="project_details"></textarea>
						</div>

						<div class="form-group col-lg-4 datepicker" data-provide="datepicker">
							<label for="project_deadline">Event Deadline</label>
					    <input type="text" name="project_deadline" class="form-control">
						</div>

					</div>
						<button class="btn btn-default" type="submit" name="action">Submit
					  </button>
						<button class="btn btn-default" type="reset" name="action">Reset
					  </button>
					{!! Form::close() !!}

@endsection
