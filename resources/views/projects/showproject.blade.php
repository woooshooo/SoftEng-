@extends('layout.app')
@section('content')

	<!-- Adding milestones-->
	<script>
	$(document).ready(function(){
	    var i=1;
	    $('#addmilestone').click(function(){
	         i++;
	         $('#dynamic_field_milestone').append('<tr id="row'+i+'"><td><input type="text"  id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td><td><input type="text" id="milestonestatus" name="milestone_status[]" class="form-control" value="Ongoing" disabled></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');
	    });
	    $(document).on('click', '.btn_remove'+i+' ', function(){
	         var btn_id = $(this).attr("id");
	         $('#row'+btn_id+'').remove();
	    });
	});
	</script>

	<div id="wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">{{$projects->projects_name}}</h1>
				</div>
		</div>
    <div class="form-group col-lg-12">
      <button class="btn btn-default"onclick="history.go(-1);">Back </button>
    </div>
				{!! Form::open(['action' => ['ProjectsController@update',$projects->projects_id], 'method' => 'POST',
				'class' => 'panel-body col-lg-12 form', 'id' => 'progressBar'])!!}
				<div class="col-lg-12">
					<div class="progress progress-striped active">
						<!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->

						<div id="projProgBar" class="progress-bar progress-bar-success" name="progress_bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">

						<!--
							Divide total/finished milestones via query, round to nearest whole number
							change value of style="width: <accordingly>"
						-->
                    	</div>
				</div>
				<div class = "col-lg-12">
					<div class="col-lg-6">
						<label for="project_details">Project Details</label>
								<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="project_details" name="project_details" disabled>{{$projects->projects_details}}</textarea>
					</div>
					<div class="col-lg-6">
						<br>
						<!--No function for milestones yet-->
						<label>Project Milestones</label><br>
						<!--Lagay ng foreach for each Milestone from DB-->
						<form id="milestonesform">
						@foreach($milestones as $value)
								<!--
								<label>
									<input type="checkbox" class="form-check-input" id="milestones" name="milestone_project" value="{{$value->milestone_name}}"> {{$value->milestone_name}}
								</label><br>
								-->
								@if($value->milestone_status == 'Finished')
	         				<label>
									<input type="checkbox" class="form-check-input" id="milestones" name="milestone_project" value="{{$value->milestone_name}}" disabled checked> {{$value->milestone_name}}
								</label><br>
								@else
								<label>
										<input type="checkbox" class="form-check-input" id="milestones" name="milestone_project" value="{{$value->milestone_name}}"> {{$value->milestone_name}}
								</label><br>
	         			@endif
	          	@endforeach
	            </form>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addmilestones">
								Add Milestones
							</button>

				</div>
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

				<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#editproject">
				  Edit
				</button>

@endsection

<!-- Edit project Modal -->
<div class="modal fade" id="editproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Project</h3>

      </div>
      <div class="modal-body">
        <div class="row">
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

								<div class="form-group col-lg-6">
									<label class="form-check-label"><u>Choose Cluster/s assigned</u></label>
									<br>
									<label><input type="checkbox" class="form-check-input" name="cluster_name[]" value="Broadcast & Production Cluster" > Broadcast & Production Cluster</label>
									<br>
									<label>
									<input type="checkbox" class="form-check-input" name="cluster_name[]" value="Creative Cluster" > Creative Cluster</label>
									<br><label>
									<input type="checkbox" class="form-check-input" name="cluster_name[]" value="Editorial & Social Media Cluster" > Editorial & Social Media Cluster</label>
									<br>
								</div>

								  <div class="form-group col-lg-12">
										<label for="project_details">Project Details</label>
										<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="project_details" name="project_details">{{$projects->projects_details}}</textarea>
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
									<!--Changed to dropdown. Change back to textbox if needed (sorry if nag buot2 ko huhuhu)-->
					    			{{Form::select('project_status', ['Ongoing' => 'Ongoing',
                                     'Finsihed' => 'Finsihed',
                                     'Pending' => 'Pending'],
          							$projects->project_status, ['class'=>'form-control'])}}
									</div>
						</div>
				</div>
      <div class="modal-footer">
				{{Form::hidden('_method','PUT')}}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!--Add milestones modal-->
<div class="modal fade" id="addmilestones" tabindex="-1" role="dialog" aria-labelledby = exampleModalCenterTitle aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="exampleModalLongTitle">Add Milestone</h3>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => 'MilestoneProjectsController@store', 'method' => 'POST',
					'class' => 'form z-depth-5', 'style' => 'padding:30px; border-radius:20px;', 'id' => 'addform'])!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 				<button type="submit" class="btn btn-primary">Save</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
