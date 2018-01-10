@extends('layout.app')
@section('content')
			<div class="container s9 m9 l9">
	      <h1>Add Project</h1>
				<form id='addform' class="form z-depth-5" style="padding:30px; border-radius:20px;">
					<div class="input-field col s3">
						<input type="text" class="validate" id="project_name">
						<label for="project_name">Project Title</label>
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
						<label for="project_details">Project Details</label>
					</div>
					<div class="input-field col s3">
						<input type="text" id="project_deadline" class="datepicker">
						<label for="project_deadline">Project Deadline</label>
					</div>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="submit" name="action">Submit
				  </button>
					<button class="btn btn-small black waves-effect waves-light z-depth-5" type="reset" name="action">Reset
				  </button>
				</form>
	    </div>
	</form>
	</div>
@endsection
