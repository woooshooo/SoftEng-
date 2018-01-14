@extends('layout.app')
@section('content')
			<div class="container s9 m9 l9">
	      <h1>Add Event</h1>
				{!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'class' => 'col-lg-12 form'])!!}
					<div class="input-field col s3">
						<input type="text" class="validate" id="project_name">
						<label for="project_name">Event Title</label>
					</div>
					<div class="input-field col s3">
						<input type="text" class="validate" id="client_name" name="client_name">
						<label for="client_name">Client Name</label>
					</div>
					<label for="cluster_name">Cluster/s Assigned</label>
					<div class="input-field col s3">
						<select id="cluster_name"class="input-field col s3" multiple>
							<option disabled selected>Choose your Cluster/s assigned</option>
							<option class="black-text" value="bpc">Broadcast & Productions Cluster</option>
							<option class="black-text" value="cc">Creative Cluster</option>
							<option class="black-text" value="esmc">Editorial & Social Media Cluster</option>
						</select>
					</div>
					<div class="input-field col s3">
						<textarea class="materialize-textarea" id="project_details" name="project_details"></textarea>
						<label for="project_details">Event Details</label>
					</div>
					<div class="form-group col-lg-6 input-group date">
						<input type="date" id="project_deadline" data-provide="datepicker" class="datepicker">
						<label for="project_deadline">Event Deadline</label>
					</div>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit
				  </button>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset
				  </button>
	    </div>
{!! Form::close() !!}
<script>
jQuery(document).ready(function($) {
	$('.datepicker').datepicker();
});
</script>
@endsection
