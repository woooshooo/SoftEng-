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
                            <label class="form-check-label"><u>Choose Cluster/s assigned</u></label>
                            <br>
                                <label><input type="checkbox" class="form-check-input" name="cluster_name[]" value="Broadcast & Production Cluster"> Broadcast & Production Cluster</label>
                                <br>
                                <label>
                                <input type="checkbox" class="form-check-input" name="cluster_name[]" value="Creative Cluster"> Creative Cluster</label>
                                <br><label>
                                <input type="checkbox" class="form-check-input" name="cluster_name[]" value="Editorial & Social Media Cluster"> Editorial & Social Media Cluster</label>
                                <br>
                        </div>


						<div class="form-group col-lg-12">
							<label for="project_details">Event Details</label>
							<textarea class="form-control" id="project_details" name="project_details"></textarea>
						</div>

						<div class="form-group col-lg-4">
							<label for="project_startdate">Project Start Date</label>
					    <input type="date" name="project_startdate" class="form-control">
						</div>
						<div class="form-group col-lg-4">
							<label for="project_deadline">Project Deadline</label>
					    <input type="date" name="project_deadline" class="form-control">
						</div>
						<div class="form-group col-lg-4">
							<label for="project_status">Status</label>
					    <input type="text" name="project_status" class="form-control">
						</div>

					</div>
						<button class="btn btn-default" type="submit" name="action">Submit
					  </button>
						<button class="btn btn-default" type="reset" name="action">Reset
					  </button>
					{!! Form::close() !!}

@endsection
