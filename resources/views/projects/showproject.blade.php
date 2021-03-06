@extends('layout.app')
@section('content')

	{{--  add volunteer for assigned--}}
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
	<script>
		$(document).ready(function(){
				var pid = $("#pid").val();
				console.log(pid);
				var x=1;
				function getSum(total, num) {
						return total + num;
				}
				$("form").on('change','#volName',function(){
					console.log("changed in showproject");
					var id = $("#volName").val();
					var eventphaseval = $("#eventphaseID").val();
					$("#eventphaseID").val(eventphaseval);
				});
				$('#addvolunteersbtn').click(function(){
					console.log('clicked button');
						$('#dynamic_field_addvolunteer').append('<tr id="row'+x+'"><td><select name="volunteers[]" id="volName'+x+'" class="form-control volName'+x+'" >@foreach($profiles as $profile)@foreach($vols as $vol)@if($profile->profile_id == $vol->profile_id)<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>@endif @endforeach @endforeach</select></td><td><select class="form-control" name="milestone[]"id="milestoneName">@foreach($milestones as $milestone)@if($milestone->projects_id == $projects->projects_id)@if($milestone->milestone_status == "Ongoing")<option value="{{$milestone->milestone_projects_id}}">{{$milestone->milestone_name}}</option>@endif @endif @endforeach</select></td><td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove1 btn-block">Remove</button></td></tr>');
						$('.selectpicker').selectpicker('render');
						console.log("Added "+$("#volName").val());
					x++;
						 $("#volName"+x).change(function(){
							 var id = $("#volName"+x).val();
							 // Validating same Item
							 for (var q = 0; q < x; q++) {
								if (id == $("#volName"+q).val() || id == $("#volName").val() ) {
									console.log('Deleting Duplicate Item..');
									$('#row'+x+'').remove();
									console.log('Duplicate Item Deleted');
								}
							 }
							 // End of Validating Same Item
						 });

				});

				$(document).on('click', '.btn_remove1', function(){
						 var btn_id = $(this).attr("id");
						 $('#row'+btn_id+'').remove();
				});
		});
	</script>
	{{--  add volunteer for events_worked--}}
	<script>
	$(document).ready(function(){
			var x=1;
			function getSum(total, num) {
			    return total + num;
			}
			$("form").on('change','#volName',function(){
				console.log("changed");
				var id = $("#volName").val();
				var eventphaseval = $("#eventphaseID").val();
				$("#eventphaseID").val(eventphaseval);
			});
			$('#addvolunteersbtn0').click(function(){
					$('#dynamic_field_addvolunteer0').append('<tr id="row'+x+'"><td><select name="volunteers[]" id="volName'+x+'" class="form-control volName'+x+'" >@foreach($profiles as $profile)@foreach($vols as $vol)@if($profile->profile_id == $vol->profile_id)<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>@endif @endforeach @endforeach</select></td><td><select class="form-control" name="milestone[]"id="milestoneName">@foreach ($milestones as $milestone)<option value="{{$milestone->milestone_projects_id}}">{{$milestone->milestone_name}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove1 btn-block">Remove</button></td></tr>');
					$('.selectpicker').selectpicker('render');
					console.log("Added "+$("#volName").val());
				x++;
					 $("#volName"+x).change(function(){
	           var id = $("#volName"+x).val();
						 // Validating same Item
						 for (var q = 0; q < x; q++) {
							if (id == $("#volName"+q).val() || id == $("#volName").val() ) {
								console.log('Deleting Duplicate Item..');
								$('#row'+x+'').remove();
								console.log('Duplicate Item Deleted');
							}
						 }
						 // End of Validating Same Item
					 });

			});

			$(document).on('click', '.btn_remove1', function(){
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

				<div class="col-lg-12">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#editproject">
							Edit Project
						</button>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addvolunteers">
						Assign Volunteers
					</button>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#additem" onclick="console.log('Opened Modal');">
						Add Item Used
					</button>
					{{-- <a href="{{url('finishedprojects/'.$projects->projects_id)}}" type="button" class="btn btn-default">
						Finish Project
					</a> --}}
					@if ($progress == 100 && $projects->projects_status == "Ongoing")
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#finishproject" onclick="console.log('Opened Modal');">
							Finish Project
						</button>
					@endif
				</div>
				{!! Form::open(['action' => ['ProjectsController@update',$projects->projects_id], 'method' => 'POST',
				'class' => 'panel-body col-lg-12 form'])!!}
				<h4>Actual Progress</h4>
					<div class="progress progress-striped active">
						<!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->
						@if ($progress >= $progressExpected)
							<div id="projProgBar" class="progress-bar progress-bar-info" name="progress_bar" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">{{$progress}}%</div>
						@else
							<div id="projProgBar" class="progress-bar progress-bar-danger" name="progress_bar" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">{{$progress}}%</div>
						@endif
					</div>
					<!-- 2nd progress bar -->
					<h4>Expected Progress</h4>
					<div class="progress progress-striped active">
						<!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->
						<div id="projProgBar2" class="progress-bar progress-bar-success" name="progress_bar" role="progressbar" aria-valuenow="{{$progressExpected}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progressExpected}}%">{{$progressExpected}}%</div>
					</div>
				<div class = "col-lg-6">
					<label for="project_details">Project Details</label>
					<textarea style="height: 30%; width: 100%; resize: none" class="form-control" id="project_details" name="project_details" disabled>{{$projects->projects_details}}</textarea>
				</div>
				<!-- milestones -->
				<div class="col-lg-6">
						<label>Project Milestones</label>@if ($progress == 100)
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addmilestones" disabled>
								Add Milestones
							</button>
						@else
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addmilestones">
								Add Milestones
							</button>
						@endif<br>
						<div class="col-lg-12 well scrollbox" style="height: 29%">
						<!--Lagay ng foreach for each Milestone from DB-->
						<form name="milestonesprojectsform" id="#milestoneprojects" class="form-check mb-2 mr-sm-2">
							<table style="width:100%; text-align:center;" id="dataTables-milestones">
								<thead>
									<th style="text-align:center; width:50%">Milestone Name</th>
									<th style="text-align:center">Deadline</th>
									<th style="text-align:center">Option</th>
								</thead>

						@foreach($milestones as $key => $value)
							@if($projects->projects_status == 'Finished')
								<tr>
									<td>{{$value->milestone_name}}</td>
									<td>{{$value->milestone_deadline}}</td>
									<td><input type="checkbox" class="form-check-input" id="milestone_project" name="milestone_project" value="{{$value->milestone_projects_id}}" checked disabled> </td>
								</tr>
							@elseif($value->milestone_status == 'Finished')
								<tr>
									<td>{{$value->milestone_name}}</td>
									<td>{{$value->milestone_deadline}}</td>
									<td><input type="checkbox" class="form-check-input" id="milestone_project" name="milestone_project" value="{{$value->milestone_projects_id}}" checked> </td>
								</tr>
							@elseif($value->milestone_status == 'Finished')
								<tr>
									<td>{{$value->milestone_name}}</td>
									<td>{{$value->milestone_deadline}}</td>
									<td><input type="checkbox" class="form-check-input" id="milestone_project" name="milestone_project" value="{{$value->milestone_projects_id}}" disabled></td>
								</tr>
							@elseif($value->milestone_status == 'Ongoing')
								<tr>
									<td>{{$value->milestone_name}}</td>
									<td>{{$value->milestone_deadline}}</td>
									<td><input type="checkbox" class="form-check-input" id="milestone_project" name="milestone_project" value="{{$value->milestone_projects_id}}"></td>
								</tr>

							@endif
							@endforeach

						</table>
							</form>

						</div>
					</div>
				<div class="col-lg-12"><br></div>
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
<div class="col-lg-12"><hr></div>
				<div class="col-lg-6">
					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols">
						<thead>
							<th>Volunteers Assigned</th>
							<th>Assigned</th>
						</thead>
						@foreach ($profiles as $profile)
							@foreach ($profileprojects as $profileproject)
									@if ($profileproject->projects_id == $projects->projects_id)
										@if ($profile->profile_id == $profileproject->profile_id)
											@foreach ($milestones as $milestone)
												@if ($profileproject->milestone_projects_id == $milestone->milestone_projects_id)
													<tr class="clickable-row" data-href="/vols/{{$profile->projects_id}}">
														<td>{{$profile->firstname}} {{$profile->lastname}}</td>
														<td>
															{{$milestone->milestone_name}}
														</td>
													</tr>
												@endif
											@endforeach
										@endif
									@endif
							@endforeach
						@endforeach
					</table>

				</div>
				<div class="col-lg-6">
					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols2">
						<thead>
							<th>Volunteers Worked</th>
							<th>Assigned</th>
						</thead>
						@foreach ($profiles as $profile)
							@foreach ($profileprojectsworked as $profileproject)
								@foreach ($milestones as $milestone)
									@if ($profileproject->projects_id == $projects->projects_id)
										@if ($profile->profile_id == $profileproject->profile_id)
											@if ($profileproject->milestone_projects_id == $milestone->milestone_projects_id)
												<tr class="clickable-row" data-href="/vols/{{$profile->projects_id}}">
													<td>{{$profile->firstname}} {{$profile->lastname}}</td>
													<td>{{$milestone->milestone_name}}</td>
												</tr>
											@endif
										@endif
									@endif
								@endforeach
							@endforeach
						@endforeach
					</table>
				</div>
<div class="col-lg-12"><hr></div>
				<div class="col-lg-12">
					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-projectitems">
						<thead>
							<th>Item Used in Project</th>
						</thead>
						@foreach ($itemdetails as $key1 => $itemdetail)
							@foreach ($projectitems as $key2 => $projectitem)
								@if ($itemdetail->equipment_details_id == $projectitem->equipment_details_id)
									<tr>
										<td>{{$itemdetail->item_name}}</td>
									</tr>
								@endif
							@endforeach
						@endforeach
					</table>
				</div>


			<br><br>
		</div>
	</div>
</div>


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
<div class="modal fade" id="addmilestones" tabindex="-1" role="dialog" aria-labelledby ="exampleModalCenterTitle" aria-hidden="true">
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
						'class' => 'panel-body form'])!!}
						<input type="hidden" name="projects_id" value="{{$projects->projects_id}}">
						<table class="table table-hover table-responsive" id="dynamic_field_milestone">
							<thead>
								<th><label class="control-label" for="milestone_name">Name</label></th>
								<th><label class="control-label" for="milestone_deadline">Deadline</label></th>
								<th><label class="control-label" for="milestone_status">Status</label></th>
							</thead>
							<tr>
								<td><input type="text"  id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td>
								<td><input type="date"  name="milestone_deadline[]" placeholder="Enter Deadline" class="form-control"></td>
								<td><input type="text" name="milestone_status[]" class="form-control" value="Ongoing" disabled>
								<input type="hidden" name="milestone_status[]" value="Ongoing"></td>
								<td><button type="button" name="" id="addmilestone" class="btn btn-success btn-block">Add More</button></td>
							</tr>
						</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
	 {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<!-- Modal Add items used-->

<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby ="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role-="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Add Items Used</h3>
			</div>
			<div class="modal-body">
					{!! Form::open(['action' => 'ItemsProjectController@store', 'method' => 'POST','class' => ' form  ui-front '])!!}
							<table class="table table-hover table-responsive" id="dynamic_field_additem">
								<thead>
									<th><label class="control-label" for="item_code">Item Code</label></th>
									<th><label class="control-label" for="item_name">Item Name</label></th>
									<th></th>
								</thead>
								<tr>
									<input type="hidden" name="projects_id" value="{{$projects->projects_id}}">
									<td><select name="item_code[]" id="itemCode" class="form-control itemCode" >
										@foreach ($itemdetails as $itemdetail)
											@if ($itemdetail->item_status == "AVAILABLE")
												<option value="{{$itemdetail->item_code}}">{{$itemdetail->item_code}}</option>
											@endif
										@endforeach
									</select></td>
									<td>
										<select name="item_name[]" class="form-control item_name"></select>
									</td>
									<td><button type="button" id="adduseditem" class="btn btn-success btn-block">Add More</button></td>
								</tr>
							</table>
					</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
	 {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<!-- Modal Add Volunteers-->
<div class="modal fade" id="addvolunteers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h3 class="modal-title">Assign Volunteers</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileProjectsController@store'], 'method' => 'POST',
					'class' => 'panel-body form ui-front'])!!}
					<div class="form-group col-lg-12">
						<input type="hidden" id="pid" name="projects_id" value="{{$projects->projects_id}}">
							<table class="table table-hover table-responsive" id="dynamic_field_addvolunteer">
								<thead>
									<th><label class="control-label">Volunteer Name</label></th>
									<th><label class="control-label">Milestone</label></th>
									<th></th>
								</thead>
								<tr>
									<td><select class="form-control" name="volunteers[]"id="volName">
										@foreach ($profiles as $profile)
											@foreach ($vols as $vol)
												@if ($profile->profile_id == $vol->profile_id)
													<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>
												@endif
											@endforeach
										@endforeach
									</select></td>
									<td><select class="form-control" name="milestone[]"id="milestoneName" required>
										@foreach ($milestones as $milestone)
											@if ($milestone->projects_id == $projects->projects_id)
												@if($milestone->milestone_status == "Ongoing")
													<option value="{{$milestone->milestone_projects_id}}">{{$milestone->milestone_name}}</option>
												@endif
											@endif
										@endforeach
									</select></td>
									<td><button type="button" id="addvolunteersbtn" class="btn btn-success btn-block">Add More</button></td>
								</tr>
							</table>
			    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			{!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Modal FinishProjects-->
<div class="modal fade" id="finishproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h3 class="modal-title">Check Volunteers</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileProjectsWorkedController@store'], 'method' => 'POST',
					'class' => 'panel-body form was-validated'])!!}
					<div class="form-group col-lg-12">
						<input type="hidden" name="projects_id" value="{{$projects->projects_id}}">
							<table class="table table-hover table-responsive" id="dynamic_field_addvolunteer0">
								<thead>
									<th><label class="control-label">Volunteer Name</label></th>
									<th><label class="control-label">Milestone</label></th>
									<th></th>
								</thead>
								<tr>
									<td><select class="form-control" name="volunteers[]"id="volName">
										@foreach ($profiles as $profile)
											@foreach ($vols as $vol)
												@if ($profile->profile_id == $vol->profile_id)
													<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>
												@endif
											@endforeach
										@endforeach
									</select></td>
									<td><select class="form-control" name="milestone[]"id="milestoneName">
										@foreach ($milestones as $milestone)
											<option value="{{$milestone->milestone_projects_id}}">{{$milestone->milestone_name}}</option>
										@endforeach
									</select></td>
									<td><button type="button" id="addvolunteersbtn0" class="btn btn-success btn-block">Add More</button></td>
								</tr>
							</table>
			    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
