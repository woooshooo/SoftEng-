@extends('layout.app')
@section('content')
	<div id="wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Show Project</h1>
				</div>
		</div>
    <div class="form-group col-lg-12">
      <button class="btn btn-default"onclick="history.go(-1);">Back </button>
    </div>
		{!! Form::open(['action' => ['ProjectsController@update',$projects->projects_id], 'method' => 'POST',
			'class' => 'panel-body col-lg-12 form'])!!}

						<div class="form-group col-lg-6">
							<label for="project_name">Project Title</label>
							<input type="text" class="form-control" id="project_name" name="project_name" value="{{$projects->projects_name}}" disabled>
						</div>

						<div class="form-group col-lg-6">
							<label for="client_name">Client Name</label>
							<input type="text" class="form-control" id="client_name" name="client_name" value="{{$projects->projects_client}}"disabled>
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
							<textarea class="form-control" id="project_details" name="project_details" disabled>{{$projects->projects_details}}</textarea>
						</div>
						<div class="form-group col-lg-4">
							<label for="project_startdate">Project Start Date</label>
					    <input type="date" name="project_startdate" class="form-control" value="{{$projects->projects_startdate}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label for="project_deadline">Project Deadline</label>
					    <input type="date" name="project_deadline" class="form-control" value="{{$projects->projects_deadline}}" disabled>
						</div>
						<div class="form-group col-lg-4">
							<label for="project_status">Status</label>
					    <input type="text" name="project_status" class="form-control" value="{{$projects->projects_status}}" disabled>
						</div>

					</div>
						<!-- <a href="/projects/{{$projects->projects_id}}/edit" class="btn btn-default">Edit</a> -->
					<br>

					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">
					  Edit
					</button>
					<br>

					<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					{!! Form::open(['action' => ['ProjectsController@update',$projects->projects_id], 'method' => 'POST',
						'class' => 'form'])!!}

									<div class="form-group col-lg-6">
										<label for="project_name">Project Title</label>
										<input type="text" class="form-control" id="project_name" name="project_name" value="{{$projects->projects_name}}">
									</div>

									<div class="form-group col-lg-6">
										<label for="client_name">Client Name</label>
										<input type="text" class="form-control" id="client_name" name="client_name" value="{{$projects->projects_client}}">
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
										<textarea class="form-control" id="project_details" name="project_details">{{$projects->projects_details}}</textarea>
									</div>
									<div class="form-group col-lg-4">
										<label for="project_startdate">Project Start Date</label>
								    <input type="date" name="project_startdate" class="form-control" value="{{$projects->projects_startdate}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="project_deadline">Project Deadline</label>
								    <input type="date" name="project_deadline" class="form-control" value="{{$projects->projects_deadline}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="project_status">Status</label>
								    <input type="text" name="project_status" class="form-control" value="{{$projects->projects_status}}">
									</div>

								</div>

      </div>
      <div class="modal-footer">
				{{Form::hidden('_method','PUT')}}
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
