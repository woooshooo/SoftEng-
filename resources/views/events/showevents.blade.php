@extends('layout.app')
@section('content')
  <!-- ADDING MORE Borrow-->
  <script type="text/javascript">
  $(document).ready(function(){
      var i=1;
      var maxvalue ="";
      $('#adduseditem').click(function(){
           i++;
           $('#dynamic_field_borrow').append('<tr id="row'+i+'"><td><select name="item_code[]" id="itemCode'+i+'" class="form-control itemCode'+i+'">@foreach($itemdetails as $key => $value)@if ($value->item_status == "AVAILABLE")<option value="{{$value->item_code}}">{{$value->item_code}}@endif</option>@endforeach</select></td><td><select name="item_name[]" class="form-control item_name'+i+'"></select></td><td><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove btn-block">Remove</button></td></tr>');

           $(".itemCode"+i).change(function(){
             var id = $("#itemCode"+i).val();
             console.log(id);
             options = "";
             $('.item_name'+i).empty();
             if (id){
               $.ajax({
                 url:"/getItemName/"+id,
                 type: "GET",
                 data:{'id':id},
                 success:function(response){
                   console.log(response);
                   for(x = 0; x < response.length;  x++){
                     options += "<option value='"+ response[x].item_name+"'>"+response[x].item_name+"</option>";
                   }
                   $('.item_name'+i).append(options);
                 },
                 error: function(data){
                   console.log(data);
                 }
               });
             }
           });
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

  });
  </script>

  <div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$events->events_name}}</h1>
        </div>

    <div class="col-lg-12">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editevent">
          Edit Event
        </button>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addvolunteers">
        Add Volunteers
      </button>
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#additem" onclick="console.log('Opened Modal');">
        Add Item Used
      </button>

      @if ($progress == 100 && $events->events_status == "Ongoing")
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#finishevent" onclick="console.log('Opened Modal');">
          Finish Event
        </button>
      @endif
    </div>
    <div class="col-lg-12"><br></div>
        {!! Form::open(['action' => ['EventsController@update',$events->events_id], 'method' => 'POST',
        'class' => 'panel-body form', 'id' => 'progressBar'])!!}
        <h4>Actual Progress</h4>
          <div class="progress progress-striped active">
            <!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->
            <div id="projProgBar" class="progress-bar progress-bar-success" name="progress_bar" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">{{$progress}}%</div>
          </div>
          <!-- 2nd progress bar -->
          <h4>Expected Progess</h4>
          <div class="progress progress-striped active">
            <!--Update aria-valuenow by embedding php code that will divide total milestones and completed milestones and round up quotient-->
            <div id="projProgBar2" class="progress-bar progress-bar-info" name="progress_bar" role="progressbar" aria-valuenow="{{$progressExpected}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progressExpected}}%">{{$progressExpected}}%</div>
          </div>

          <div class="col-lg-6">
            <label for="events_details">Event Details</label>
                <textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="event_details" name="event_details" disabled>{{$events->events_details}}</textarea>
          </div>
          <!-- milestones -->
  				<div class="col-lg-6">
  						<label>Event Milestones</label>@if ($progress == 100)
  							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addmilestones" disabled>
  								Add Milestones
  							</button>
  						@else
  							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addmilestones">
  								Add Milestones
  							</button>
  						@endif<br>
  						<div class="col-lg-12 well scrollbox" style="height: 29%">
  						<form name="milestonesform" id="milestonesform" class="form-check mb-2 mr-sm-2">
  							<table style="width:100%; text-align:center;">
  								<thead>
  									<th style="text-align:center; width:50%">Milestone Name</th>
  									<th style="text-align:center">Option</th>
  								</thead>

  						@foreach($milestones as $value)
  								@if($value->milestone_status == 'Finished')
  									<tr>
  									<td>{{$value->milestone_name}}</td>
  									<td><input type="checkbox" class="form-check-input" id="milestones" name="milestone_event" value="{{$value->milestone_events_id}}" checked> </td>
  								</tr>
  							@else
  								<tr>
  									<td>{{$value->milestone_name}}</td>
  									<td><input type="checkbox" class="form-check-input" id="milestones" name="milestone_event" value="{{$value->milestone_events_id}}"></td>
  									</tr>
  								@endif
  							@endforeach

  						</table>
  							</form>
  						</div>
  					</div>
        <div class="form-group col-lg-4">
            <label for="event_startdate">Event Start Date</label>
              <input type="date" name="event_startdate" class="form-control" value="{{$events->events_startdate}}" disabled>
        </div>
        <div class="form-group col-lg-4">
            <label for="event_deadline">Event Deadline</label>
              <input type="date" name="event_deadline" class="form-control" value="{{$events->events_deadline}}" disabled>
        </div>
        <div class="form-group col-lg-4">
            <label for="event_status">Status</label>
              <input type="text" name="event_status" class="form-control" value="{{$events->events_status}}" disabled>
        </div>
        <div class="col-lg-12"><hr></div>
        				<div class="col-lg-6">
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols">
        						<thead>
        							<th>Volunteers Assigned</th>
        							<th>Cluster</th>
        						</thead>
                    @foreach ($profiles as $profile)
                      @foreach ($vols as $vol)
                        @foreach ($profileevents as $profileevent)
                          @if ($profileevent->events_id == $events->events_id)
                            @if ($profile->profile_id == $profileevent->profile_id)
                              @if ($profile->profile_id == $vol->profile_id)
                                <tr class="clickable-row" data-href="/vols/{{$profile->profile_id}}">
                                  <td>{{$profile->firstname}} {{$profile->lastname}}</td>
                                  <td>{{$vol->cluster}}</td>
                                </tr>
                              @endif
                            @endif
                          @endif
                        @endforeach
                      @endforeach
                    @endforeach
        					</table>
        				</div>

        				<div class="col-lg-6">
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-vols2">
        						<thead>
        							<th>Volunteers Worked</th>
        							<th>Cluster</th>
        						</thead>
        						@foreach ($profiles as $profile)
        							@foreach ($vols as $vol)
                        @foreach ($profileevents as $profileevent)
                          @if ($profileevent->events_id == $events->events_id)
                            @if ($profile->profile_id == $profileevent->profile_id)
                              @if ($profile->profile_id == $vol->profile_id)
        												@if ($profileevent->status == "Worked")
        													<tr class="clickable-row" data-href="/vols/{{$profile->events_id}}">
        														<td>{{$profile->firstname}} {{$profile->lastname}}</td>
        														<td>{{$vol->cluster}}</td>
        													</tr>
        												@endif
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
        					<table  width="100%" class="table table-bordered table-hover table-responsive" id="dataTables-eventitems">
        						<thead>
        							<th>Item Used in Event</th>
        						</thead>
        						@foreach ($itemdetails as $itemdetail)
        							@foreach ($eventitems as $eventitem)
        								@if ($itemdetail->equipment_details_id == $eventitem->equipment_details_id)
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
          <div class="col-lg-12"><br></div>
@endsection

<!--Edit Project Modal-->
<div class="modal fade" id="editevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Event</h3>

      </div>
      <div class="modal-body">
        <div class="row">
					{!! Form::open(['action' => ['EventsController@update',$events->events_id], 'method' => 'POST',
						'class' => 'form'])!!}

									<div class="form-group col-lg-12">
										<label for="events_name">Project Title</label>
										<input type="text" class="form-control" id="events_name" name="events_name" value="{{$events->events_name}}">
									</div>


								  <div class="form-group col-lg-12">
										<label for="events_details">Event Details</label>
										<textarea style="height: 30%; width: 100%; resize: vertical" class="form-control" id="events_details" name="events_details">{{$events->events_details}}</textarea>
									</div>
									<div class="form-group col-lg-4">
										<label for="events_startdate">Event Start Date</label>
								    <input type="date" name="events_startdate" class="form-control" value="{{$events->events_startdate}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="events_deadline">Event Deadline</label>
								    <input type="date" name="events_deadline" class="form-control" value="{{$events->events_deadline}}">
									</div>
									<div class="form-group col-lg-4">
										<label for="events_status">Status</label>
					    			{{Form::select('events_status', ['Ongoing' => 'Ongoing',
                                     'Finsihed' => 'Finsihed',
                                     'Pending' => 'Pending'],
          							$events->events_status, ['class'=>'form-control'])}}
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
				{!! Form::open(['action' => 'MilestoneEventsController@store', 'method' => 'POST',
						'class' => 'panel-body form milestone'])!!}
						<input type="hidden" name="events_id" value="{{$events->events_id}}">
						<table class="table table-hover table-responsive" id="dynamic_field_milestone">
							<thead>
								<th><label class="control-label" for="milestone_name">Name</label></th>
								<th><label class="control-label" for="milestone_status">Status</label></th>
							</thead>
							<tr>
								<td><input type="text"  id="milestonename" name="milestone_name[]" placeholder="Enter Milestone name" class="form-control"></td>
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
					{!! Form::open(['action' => 'ItemsEventController@store', 'method' => 'POST','class' => ' form  ui-front '])!!}
							<table class="table table-hover table-responsive" id="dynamic_field_borrow">
								<thead>
									<th><label class="control-label" for="item_code">Item Code</label></th>
									<th><label class="control-label" for="item_name">Item Name</label></th>
									<th></th>
								</thead>
								<tr>
                  <input type="hidden" name="events_id" value="{{$events->events_id}}">
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
									<td><button type="button" name="adduseditem" id="adduseditem" class="btn btn-success btn-block">Add More</button></td>
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
				<h3 class="modal-title">Add Volunteers</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileEventsController@store'], 'method' => 'POST',
					'class' => 'panel-body form ui-front'])!!}
					<div class="form-group col-lg-12">
						<input type="hidden" name="events_id" value="{{$events->events_id}}">
							<table class="table table-hover table-responsive" id="dynamic_field_addvolunteer">
								<thead>
									<th><label class="control-label">Volunteer Name</label></th>
									<th></th>
								</thead>
								<tr>
                  <td><select class="form-control" name="volunteers[]">
										@foreach ($profiles as $profile)
											@foreach ($vols as $vol)
												@if ($profile->profile_id == $vol->profile_id)
													<option value="{{$profile->profile_id}}">{{$profile->firstname}} {{$profile->lastname}}</option>
												@endif
											@endforeach
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
<div class="modal fade" id="finishevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h3 class="modal-title">Check Volunteers</h3>
      </div>
      <div class="modal-body">
				{!! Form::open(['action'=> ['ProfileEventsController@update', $events->events_id], 'method' => 'POST',
					'class' => 'panel-body form was-validated'])!!}
					<div class="form-group col-lg-12">
						{{-- <button id="checkAll" class="btn btn-default">Check All</button>	 --}}

						<div class="scrollbox">
							@foreach ($profiles as $profile)
								@foreach ($vols as $vol)
                  @foreach ($profileevents as $profileevent)
                    @if ($profileevent->events_id == $events->events_id)
                      @if ($profile->profile_id == $profileevent->events_id)
												@if ($profile->profile_id == $vol->profile_id)
													<div class="form-group col-lg-6">
													<input class="vols" type="checkbox" name="volunteers[]" value="{{$profile->profile_id}}"> {{$profile->firstname}} {{$profile->lastname}}
												</div>
												@endif
											@endif
										@endif
									@endforeach
								@endforeach
							@endforeach
						</div>
			    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
				{{Form::hidden('_method','PUT')}}
				{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
