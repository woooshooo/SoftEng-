@extends('layout.app')
@section('content')
	<?php
		use App\Projects;
		use App\Staffs;
		use App\Profile;
		use App\ProfileProjects;
	?>
				<div class="panel-body">
					<div class="panel-heading">
						<h1>Projects</h1>
					</div>
					<div class="navbutton">
						<button type="button" class="btn btn-default btn-lg btn-inline" data-toggle="modal" data-target="#addproject">Add project</button>
					</div><br>
					<div>
            <table class="table table-bordered table-hover table-responsive" id="dataTables-projects">
                <thead>
                    <tr>
                    <th>Project Name</th>
                    <th>Client</th>
										<th>Start Date</th>
										<th>End Date</th>
                    <th>Status</th>
                    </tr>
                </thead>
								@foreach ($projects as $value)
									@if ($value->projects_deadline < date("Y-m-d") && $value->projects_status == "Ongoing")
										<tr class="clickable-row" data-href="/projects/{{$value->projects_id}}">
												<td>{{$value->projects_name}}</td>
												<td>{{$value->projects_client}}</td>
												<td>{{$value->projects_startdate}}</td>
												<td  style="color: tomato">{{$value->projects_deadline}}</td>
												@if ($value->projects_status == "Ongoing")
													<td><font color="green">{{$value->projects_status}}</font></td>
												@elseif ($value->projects_status == "Finished")
													<td><font color="tomato">{{$value->projects_status}}</font></td>
												@else
													<td><font color="blue">{{$value->projects_status}}</font></td>
												@endif
										</tr>
									@else
										<tr class="clickable-row" data-href="/projects/{{$value->projects_id}}">
												<td>{{$value->projects_name}}</td>
												<td>{{$value->projects_client}}</td>
												<td>{{$value->projects_startdate}}</td>
												<td>{{$value->projects_deadline}}</td>
												@if ($value->projects_status == "Ongoing")
													<td><font color="green">{{$value->projects_status}}</font></td>
												@elseif ($value->projects_status == "Finished")
													<td><font color="tomato">{{$value->projects_status}}</font></td>
												@else
													<td><font color="blue">{{$value->projects_status}}</font></td>
												@endif
										</tr>
									@endif
								@endforeach
            </table>
					</div>
        </div>
@endsection

<!--Modal Add Project-->
<div class="modal fade" id="addproject" tabindex="-1" role="dialog" aria-labelledby="myLargeModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="exampleModalLongTitle">Add Project</h3>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST',
					'class' => 'panel body col-lg-12 form ui-front'])!!}
					<div class="col-lg-6">
						<label class="control-label" for="projects_name">Project Name</label>
						<input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" required>
					</div>
					<div class="col-lg-6">
						<label class="control-label" for="client_name">Client Name</label>
						<input type="text" class="form-control" id="projects_client" name="client_name" placeholder="Client Name" required>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-12">
						<label for="project_details">Project Details</label>
						<textarea class="form-control" style="height: 30%; width: 100%; resize: vertical" id="project_details" name="project_details"required></textarea>
					</div>
					<div class="col-lg-12"><br></div>
					<div class="col-lg-4">
						<label for="project_startdate">Project Start Date</label>
						<input type="date" name="project_startdate" class="form-control" id="from"required>
					</div>
					<div class="col-lg-4">
						<label for="project_deadline">Project Deadline</label>
						<input type="date" name="project_deadline" class="form-control" id="to"required>
					</div>
					<div class="col-lg-4">
						<label for="project_status">Status</label>
						<!--Changed to dropdown. Change back to textbox if needed (sorry if nag buot2 ko huhuhu)-->
							<select class="form-control col-lg-4" name="project_status">
								<option value="Ongoing">Ongoing</option>
								<option value="Pending">Pending</option>
							</select>
					</div>
					<div class="col-lg-12"><br></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 				<button type="submit" class="btn btn-primary">Save</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
