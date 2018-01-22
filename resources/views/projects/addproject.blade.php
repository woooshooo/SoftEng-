@extends('layout.app')
@section('content')
	<div id="wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Add Project</h1>
				</div>
		</div>
		{!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST',
			'class' => 'panel-body col-lg-12 form'])!!}

						<div class="form-group col-lg-6">
							<label for="project_name">Project Title</label>
							<input type="text" class="form-control" id="project_name" name="project_name">
						</div>

						<div class="form-group col-lg-6">
							<label for="client_name">Client Name</label>
							<input type="text" class="form-control" id="client_name" name="client_name">
						</div>

                        <!-- commented out for testing haha
						<div class="form-group col-lg-6">
							<label for="cluster_name">Choose Cluster/s assigned</label>
								<select id="cluster_name"class="form-control" multiple>
									<option class="black-text" value="bpc">Broadcast & Productions Cluster</option>
									<option class="black-text" value="cc">Creative Cluster</option>
									<option class="black-text" value="esmc">Editorial & Social Media Cluster</option>
								</select>
						</div>
                        -->

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
							<label for="project_details">Project Details</label>
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
